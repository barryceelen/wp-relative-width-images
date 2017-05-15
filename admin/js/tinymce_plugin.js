/*global tinymce*/
tinymce.PluginManager.add( 'relative_width_images', function( editor ) {

	/*
	 * After resizing an image add a 'data-rwi' attribute and set its
	 * value to the width of the image as a percentage of the current editor width.
	 *
	 * @todo Also set the data attribute when inserting an image.
	 */
	editor.on( 'ObjectResized', function( event ) {

		if ( event.target.nodeName === 'IMG' ) {

			var editorWidth   = tinymce.activeEditor.dom.doc.body.clientWidth;
			var selectedImage = tinymce.activeEditor.selection.getNode();
			var imageWidth    = Math.min( Math.max( parseInt( ( event.width / editorWidth ) * 100, 10 ), 1 ), 100 );

			tinymce.activeEditor.dom.setAttrib( selectedImage, 'data-rwi', imageWidth );
		}
	});
});
