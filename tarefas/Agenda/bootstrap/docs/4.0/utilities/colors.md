---
layout: docs
title: Colors
description: Convey meaning through color with a handful of color utility classes. Includes support for styling links with hover states, too.
group: utilities
toc: true
---

{% example html %}
{% for color in site.data.theme-colors %}
<p class="text-{{ color.name }}">.text-{{ color.name }}</p>{% endfor %}
{% endexample %}

Contextual text classes also work well on anchors with the provided hover and focus states. **Note that the `.text-white` class has no link styling.**

{% example html %}
{% for color in site.data.theme-colors %}
<p><a href="#" class="text-{{ color.name }}{% if color.name == "light" %} bg-gray{% endif %}">{{ color.name | capitalize }} link</a></p>{% endfor %}
{% endexample %}

Similar to the contextual text color classes, easily set the background of an element to any contextual class. Anchor components will darken on hover, just like the text classes. Background utilities **do not set `color`**, so in some cases you'll want to use `.text-*` utilities.

{% example html %}
{% for color in site.data.theme-colors %}
<div class="p-3 mb-2 bg-{{ color.name }} {% if color.name == "light" %}text-gray-dark{% else %}text-white{% endif %}">.bg-{{ color.name }}</div>{% endfor %}
<div class="p-3 mb-2 bg-white text-gray-dark">.bg-white</div>
{% endexample %}

{% callout info %}
#### Dealing with specificity

Sometimes contextual classes cannot be applied due to the specificity of another selector. In some cases, a sufficient workaround is to wrap your element's content in a `<div>` with the class.
{% endcallout %}

{% capture callout-include %}{% include callout-warning-color-assistive-technologies.md %}{% endcapture %}
{{ callout-include | markdownify }}
