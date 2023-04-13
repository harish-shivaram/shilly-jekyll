---
title: Books
usedate: true
layout: list
pagination:
    enabled: true
    per_page: 8
    collection: books
    sort_field: date
    sort_reverse: true
---
{% include top.html %}
<section class="posts">
	{% for post in paginator.posts %}<article>
	<header>
		<span class="date">{{post.date|date: "%-d %B %Y" }}</span>
		<h3><a href="{{ post.url }}">{{ post.title }}</a></h3>
	</header>
	<a href="{{post.url}}" class="image fit"><img src="{{post.image}}" alt="{{post.title}}" /></a>
	<p>{{post.excerpt}}</p>
	<ul class="actions">
		<li><a href="{{post.url}}" class="button">Full Story</a></li>
	</ul>
	</article>{% endfor %}
</section>
{% include paginate.html %}
{% include bottom.html %}