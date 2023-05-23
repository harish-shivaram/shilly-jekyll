---
title: Panorama
layout: post
image: /images/panorama.jpg
needsortable: true
---

We had a text book in high school English called "Panorama: A Selection of Poems". The book comprised a nice cross-section of poetry by the great masters, as well as a number of poems by Indian poets.

Despite their best efforts, neither the book, nor the tireless efforts of my teachers were successful in inspiring a love of poetry back then.

More recently, my copy of the text book surfaced when we were dusting some old cupboards. I thumbed through the tome and found that, perhaps at some subconscious level, some finer sentiments were imbued. 

Here are most of the poems from the book, the ones that could be found on the net.

<table class="sortable">
<thead><tr><th>Poet</th><th>Work</th></tr></thead>
{% for poem in site.panorama %}
        <tr><td>{{ poem.author }}</td>
        <td data-sort="{{ poem.title }}"><a href="{{ poem.url }}">{{ poem.title }}</a></td></tr>
{% endfor %}
</table>
