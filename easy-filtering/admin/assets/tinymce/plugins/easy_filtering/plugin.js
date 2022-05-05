(function() {
    tinymce.PluginManager.add('easy_filtering', function( editor, url ) {

        editor.addButton('easy_filtering', {
            text: '',
            icon: true,
            image: url + '/filter.svg',
            tooltip: 'Easy Filtering',
            onclick: function() {
                editor.windowManager.open( {
                    title: 'Insert Filter',
                    width: 400,
                    height: 100,
                    body: [
                        {
                            type: 'listbox',
                            name: 'listboxName',
                            label: 'Filters',
                            values: tinyMCE.DOM.easy_filtering_filters_list
                        }
                    ],
                    onsubmit: function( e ) {

                        editor.insertContent( '[easy-filtering filter_id="' + e.data.listboxName + '"]');
                    }
                });
            }
        });
    });
})();