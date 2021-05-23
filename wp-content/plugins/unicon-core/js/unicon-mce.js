(function() {

    if (typeof mintiTinymce === 'undefined' || ! mintiTinymce) {
        return;
    }

    tinymce.PluginManager.add('minti_shortcodes_mce_button', function(editor, url) {
        var menuData = [];
        var shortcodes = mintiTinymce.shortcodes;
        jQuery.each(shortcodes, function(key, valueObj) {
            var $obj = {
                text: valueObj.text,
                onclick: function() {
                    editor.insertContent(valueObj.insert);
                }
            };
            menuData.push($obj);
        });

        editor.addButton('minti_shortcodes_mce_button', {
            text : mintiTinymce.btnLabel,
            type : 'menubutton',
            icon : false,
            menu : menuData
        });

    });

}) ();
