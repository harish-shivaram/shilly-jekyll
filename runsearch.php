---
layout: null
---

<?php

//-------------------------------------------------------------
// Define $entries_found as a empty array
//
// This will later on be used as a holder for all the entries
// that we found containing the keywords that the user entered
//-------------------------------------------------------------
$entries_found = array();

//-------------------------------------------------------------
// Gather the keywords
//-------------------------------------------------------------
$query = strtolower($_POST['s']);

if (strlen($query) == 0) {
	goto end_x;
}
//$query = "Monet";

//-------------------------------------------------------------
// Check if there are any keywords with quotes around it
//-------------------------------------------------------------
preg_match('/"(.*?)"/', $query, $quoted_string);


//-------------------------------------------------------------
// Check if there are any negative keywords
// If there is, we remove the hyphen and the space. We also
// remove the negative string from $query
//-------------------------------------------------------------
preg_match('/(\s-\w+).*/', $query, $negative_strings);

if($negative_strings) {
  $negative_strings = explode(' ', $negative_strings[0]);
  $negative_strings = array_filter($negative_strings);

  $i = 0;
  foreach($negative_strings as $negative_string) {
    $length = strlen($negative_string);

    //-------------------------------------------------------------
    // Check if the string has more than 1 character i.e more than
    // just a hyphen. If it does -> continue with removing the string
    // from $query
    //-------------------------------------------------------------
    if($length > 1) {
      $trimmed_negative_strings[$i] = substr($negative_string, 1, $length);

      $query = str_replace($negative_string, '', $query);
      $i++;

    } else {
      //-------------------------------------------------------------
      // If the string only contain 1 characted i.e the string contains
      // ONLY a hyphen -> Remove that hyphen from the $query
      //-------------------------------------------------------------
      $query = str_replace($negative_string, '', $query);
    }
  }

}


//-------------------------------------------------------------
// 1. Split the keywords for later use
// 2. Filter the array to get rid of possible blank spaces
//-------------------------------------------------------------
$queries = explode(' ', $query);
$queries = array_filter($queries);


//-------------------------------------------------------------
// 1. Read the entries.json file
// 2. Decode it and store the entries in $entries
//-------------------------------------------------------------
$json_entries = file_get_contents("solr.json");
$entries = json_decode($json_entries, true);



//-------------------------------------------------------------
// This function checks if it can find entries with the
// specified pattern
//-------------------------------------------------------------
function checkWords($pattern, $subject) {
  if(preg_match($pattern, $subject) > 0) {
    return true;
  }
  return false;
}


$weight = array();

//-------------------------------------------------------------
// Start looping through the entries and do some magic
//-------------------------------------------------------------
$i = 0;
foreach ($entries as $entry) {
  $weight[$i] = 0;
  if(isset($negative_string) && !empty($negative_string)) {
    //-------------------------------------------------------------
    // Negative keyword check;
    //
    // Here we check the entry id, name and category. If we find
    // any entry id, name or category containing a negative keyword,
    // we will ignore that entry
    //-------------------------------------------------------------
    $pattern = '/' . implode('|', $trimmed_negative_strings) . '/i';

    if ((checkWords($pattern, $entry['title'])) || checkWords($pattern, $entry['content']) ||
      (array_key_exists('author', $entry) && checkWords($pattern, $entry['author'])) ||
      (array_key_exists('paintings', $entry) && checkWords($pattern, implode(" ", $entry['paintings'])))) {
      continue;
    }
  }

  { 

    //-------------------------------------------------------------
    // Regular check;
    //
    // Here we check the entry id, name and category. If we find
    // any entry id, name or category containing any of the keywords,
    // we will put that in the 'entries_found' array
    //-------------------------------------------------------------
    $pattern = '/' . implode('|', $queries);
    if(isset($quoted_string) && !empty($quoted_string)) {
      $pattern .= '|\b' . $quoted_string[1] . '\b';
    }
    $pattern .= '/i';

    if (checkWords($pattern, $entry['title'])) {
      $entries_found[$i] = $entry;
      $weight[$i] += 4;
    }
    if (array_key_exists('author', $entry) && checkWords($pattern, $entry['author'])) {
      $entries_found[$i] = $entry;
      $weight[$i] += 3;
    }
    if (checkWords($pattern, $entry['content'])) {
      $entries_found[$i] = $entry;
      $weight[$i] += 2;
    }
    if (array_key_exists('paintings', $entry)) {
      $text = implode(" ", $entry['paintings']);
      if (checkWords($pattern, $text)) {
        $entries_found[$i] = $entry;
        $weight[$i] += 1;
      }
    }
  }

  if ($weight[$i]) {
    $i++;
  } else {
    unset($weight[$i]);
  }

}


//-------------------------------------------------------------
// SORT THE PRODUCT FOUND ARRAY
//
// This will sort the array on the weight (descending)
//-------------------------------------------------------------
array_multisort($weight, SORT_DESC, $entries_found);

end_x:

?>
