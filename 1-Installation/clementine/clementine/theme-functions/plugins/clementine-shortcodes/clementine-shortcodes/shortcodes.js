jQuery(function($) {
    'use strict';
    tinymce.PluginManager.add('clementine', function( editor, url ) {
        editor.addButton( 'clementine', {
            text: 'Shortcodes',
            // icon: 'premioThemes-icon',
            classes: 'shortcode-button',
            type: 'menubutton',
            menu: [
                // Shortcode
                {
                    text: 'Button',
                    onclick: function() {
                        editor.windowManager.open({
                            title: 'Add Button',
                            width: 450,
                            height: 200,
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'btn_class',
                                    label: 'Class'
                                },
                                {
                                    type: 'textbox',
                                    name: 'btn_target',
                                    label: 'Target'
                                },
                                {
                                    type: 'textbox',
                                    name: 'btn_label',
                                    label: 'Label'
                                }
                            ],
                            onsubmit: function(e) {
                                editor.insertContent('[button target="'+ e.data.btn_target +'" class="'+ e.data.btn_class +'"]'+ e.data.btn_label +'[/button]');
                            }
                        });
                    }
                },
                // Shortcode
                {
                    text: 'Social Media',
                    onclick: function() {
                        editor.insertContent('[socialmedia][/socialmedia]');
                    }
                },
                // Shortcode
                {
                    text: 'Dropcap',
                    onclick: function() {
                        editor.insertContent('[dropcap][/dropcap]');
                    }
                },
                // Shortcode
                {
                    text: 'Row',
                    onclick: function() {
                        editor.insertContent('[row][/row]');
                    }
                },
                // Shortcode
                {
                    text: 'Column Full Width',
                    onclick: function() {
                        editor.windowManager.open({
                            title: 'Add Column',
                            width: 450,
                            height: 200,
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'column_full',
                                    label: 'Text',
                                    multiline: true,
                                    minWidth: 320,
                                    minHeight: 100
                                },
                            ],
                            onsubmit: function(e) {
                                editor.insertContent('[column class="12"]'+ e.data.column_full +'[/column]');
                            }
                        });
                    }
                },
                // Shortcode
                {
                    text: 'Column One Half',
                    onclick: function() {
                        editor.windowManager.open({
                            title: 'Add Column',
                            width: 450,
                            height: 200,
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'column_1_half',
                                    label: 'Text',
                                    multiline: true,
                                    minWidth: 320,
                                    minHeight: 100
                                },
                            ],
                            onsubmit: function(e) {
                                editor.insertContent('[column class="6"]'+ e.data.column_1_half +'[/column]');
                            }
                        });
                    }
                },
                // Shortcode
                {
                    text: 'Column One Third',
                    onclick: function() {
                        editor.windowManager.open({
                            title: 'Add Column',
                            width: 450,
                            height: 200,
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'column_1_third',
                                    label: 'Text',
                                    multiline: true,
                                    minWidth: 320,
                                    minHeight: 100
                                },
                            ],
                            onsubmit: function(e) {
                                editor.insertContent('[column class="4"]'+ e.data.column_1_third +'[/column]');
                            }
                        });
                    }
                },
                // Shortcode
                {
                    text: 'Column One Fourth',
                    onclick: function() {
                        editor.windowManager.open({
                            title: 'Add Column',
                            width: 450,
                            height: 200,
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'column_1_fourth',
                                    label: 'Text',
                                    multiline: true,
                                    minWidth: 320,
                                    minHeight: 100
                                },
                            ],
                            onsubmit: function(e) {
                                editor.insertContent('[column class="3"]'+ e.data.column_1_fourth +'[/column]');
                            }
                        });
                    }
                },
                // Shortcode
                {
                    text: 'Column Two Third',
                    onclick: function() {
                        editor.windowManager.open({
                            title: 'Add Column',
                            width: 450,
                            height: 200,
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'column_2_third',
                                    label: 'Text',
                                    multiline: true,
                                    minWidth: 320,
                                    minHeight: 100
                                },
                            ],
                            onsubmit: function(e) {
                                editor.insertContent('[column class="8"]'+ e.data.column_2_third +'[/column]');
                            }
                        });
                    }
                },
                // Shortcode
                {
                    text: 'Column Three Fourth',
                    onclick: function() {
                        editor.windowManager.open({
                            title: 'Add Column',
                            width: 450,
                            height: 200,
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'column_3_fourth',
                                    label: 'Text',
                                    multiline: true,
                                    minWidth: 320,
                                    minHeight: 100
                                },
                            ],
                            onsubmit: function(e) {
                                editor.insertContent('[column class="9"]'+ e.data.column_3_fourth +'[/column]');
                            }
                        });
                    }
                },
                // Shortcode
                {
                    text: 'Column One Sixth',
                    onclick: function() {
                        editor.windowManager.open({
                            title: 'Add Column',
                            width: 450,
                            height: 200,
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'column_1_sixth',
                                    label: 'Text',
                                    multiline: true,
                                    minWidth: 320,
                                    minHeight: 100
                                },
                            ],
                            onsubmit: function(e) {
                                editor.insertContent('[column class="2"]'+ e.data.column_1_sixth +'[/column]');
                            }
                        });
                    }
                },
            ]
        });
    });
});