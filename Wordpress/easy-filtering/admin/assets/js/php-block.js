// License: GPLv2+

var el = wp.element.createElement,
    registerBlockType = wp.blocks.registerBlockType,
    ServerSideRender = wp.components.ServerSideRender,
    TextControl = wp.components.TextControl,
    InspectorControls = wp.editor.InspectorControls;
    PlainText = wp.editor.PlainText;
    Fragment = wp.element.Fragment;


/*
 * Here's where we register the block in JavaScript.
 *
 * It's not yet possible to register a block entirely without JavaScript, but
 * that is something I'd love to see happen. This is a barebones example
 * of registering the block, and giving the basic ability to edit the block
 * attributes. (In this case, there's only one attribute, 'foo'.)
 */
registerBlockType( 'fpc/php-block', {
    title: 'PHP Block',
    icon: 'megaphone',
    category: 'widgets',

    /*
     * In most other blocks, you'd see an 'attributes' property being defined here.
     * We've defined attributes in the PHP, that information is automatically sent
     * to the block editor, so we don't need to redefine it here.
     */

    edit: function( props ) {
        return
        el( PlainText, {
            tagName: 'h2',
            className: props.className,
            value: props.attributes.value,
            onChange: function( content ) {
                props.setAttributes( { content: content } );
            }
        },

            ),
            el( InspectorControls, {},
                el( TextControl, {
                    label: 'Foo',
                    value: props.attributes.foo,
                    onChange: ( value ) => { props.setAttributes( { foo: value } ); },
                } )
            );
    },

    // We're going to be rendering in PHP, so save() can just return null.
    save: function() {
        return null;
    },
} );
