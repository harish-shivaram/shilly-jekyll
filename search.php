---
title: Search
layout: null
---

<?php
require "runsearch.php";
?>
{%include top.html %}
<!-- Content-->
<div class="wil-content">

	<!-- Section -->
	<section class="awe-section">
		<div class="container">
			<!-- page-title -->
			<div class="page-title pb-40">
				{% include breadcrumbs.html %}
				<h1 class="page-title__title">{{page.title}} &mdash; <?php echo $query; ?></h1>
				<p class="page-title__text">{{page.description}}</p>
				<div class="page-title__divider"></div>
			</div><!-- End / page-title -->
		</div>
	</section>
	<!-- End / Section -->

	<!-- Section -->
	<section class="awe-section bg-gray">
		<div class="container">
			<div class="grid-css grid-css--masonry" data-col-lg="3" data-col-md="2" data-col-sm="2" data-col-xs="1" data-gap="30">
				<div class="grid__inner">
					<div class="grid-sizer"></div>
<?php
for ($i = 0; $i < count($entries_found); $i++) {
	echo <<< RAW
	<div class="grid-item"><div class="grid-item__inner"><div class="grid-item__content-wrapper">
			<div class="post">
				<div class="post__media">
RAW;
	if (array_key_exists('image', $entries_found[$i])) {
		printf('<a href="%s"><img src="%s" alt=""/></a>', $entries_found[$i]['url'], $entries_found[$i]['image']);
	}
	echo <<< RAW
				</div>
				<div class="post__body">
				<h2 class="post__title">
RAW;
	printf("<a href=\"%s\">%s</a></h2><div class=\"post__meta\">",
		$entries_found[$i]['url'], $entries_found[$i]['title']);
   	if (array_key_exists('author', $entries_found[$i])) {
		printf("<span class=\"author\">by %s</span>\n", $entries_found[$i]['author']);
	}
	if (array_key_exists('date', $entries_found[$i])) {
		$date = date_create($entries_found[$i]['date']);
		printf("<span class=\"date\">%s</span>\n", date_format($date, "d M Y"));
	}
	echo "</div><!-- post_meta -->";
	if (array_key_exists('description', $entries_found[$i])) {
		printf('<p class="post__text">%s</p>', $entries_found[$i]['description']);
	}
	printf('<a class="md-btn md-btn--outline-primary" href="%s">read more</a>',
		$entries_found[$i]['url']);
	echo <<< RAW
			</div></div><!-- post & body -->
		</div></div></div><!-- grid -->
RAW;
        if ($i == 11) {
		break;
	}
}
?>
				</div>
			</div>
		</div>
	</section>

	<section class="awe-section">
		<div class="container">
			{% include disqus.html %}
		</div>
	</section>
	
</div>
<!-- End / Content-->
{%include bottom.html%}
