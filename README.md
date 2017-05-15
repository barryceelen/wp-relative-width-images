WordPress Fluid Width Images Plugin
===================================

Fluid page widths and responsive text sizes are all the rage, but, but.. what about those poor images?

This somewhat experimental plugin adds a `rwi` data attribute to the image tag after resizing an image in the TinyMCE editor. Its value is the width of the image in percentages of the current editor width. Note that rounding will occur as css is only included for integers.
A stylesheet is enqueued containing selectors that 'translate' the data attribute values to a percentage width, eg.

```
[data-rwi="50"] { width: 50% }
```

By default the stylesheet is only enqueued if `is_singular()` returns `true`.   
The `relative_width_images_enqueue_styles` filter can be used to change this behaviour.

```
add_filter( 'relative_width_images_enqueue_styles', 'prefix_my_cool_filter' );

function prefix_my_cool_filter( enqueue_styles ) {

	if ( is_singular() || is_archive() ) {
		$enqueue_styles = true;
	}

	return $enqueue_styles;
}
```