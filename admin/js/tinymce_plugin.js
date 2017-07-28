/**
 * TinyMCE plugin which adds a size class when resizing an image.
 *
 * @since 1.0.0
 * @package Relative_Width_Images
 */

/* global tinymce */

tinymce.PluginManager.add( 'relative_width_images', function( editor ) {

	/*
	 * After resizing an image add a 'data-rwi' attribute and set its
	 * value to the width of the image as a percentage of the current editor width.
	 *
	 * @todo Also set the data attribute when inserting an image.
	 */
	editor.on( 'ObjectResized', function( event ) {

		if ( event.target.nodeName === 'IMG' ) {
			tinymce.activeEditor.dom.setAttrib( tinymce.activeEditor.selection.getNode(), 'data-rwi', getPercentage( event.width ) );
		}
	});

	// After editing an image in the media view update the 'data-rwi' attribute.
	if ( wp.media.events ) {

		wp.media.events.on( 'editor:image-update', function( data ) {
			data.editor.$( data.image ).attr( { 'data-rwi': getPercentage( data.image.attributes.width.value ) } );
		});
	}

	/**
	 * Get percentage value based on the width of the editor body.
	 *
	 * Note: Rounding will occur as we only provide css for integers.
	 *
	 * @since 1.0.0
	 * @param {int} width Width of the image.
	 * @return {int} Percentage value.
	 */
	function getPercentage( width ) {

		return Math.min( Math.max( parseInt( ( width / tinymce.activeEditor.dom.doc.body.clientWidth ) * 100, 10 ), 1 ), 100 );
	}
});
