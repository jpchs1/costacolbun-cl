<?php
if (!class_exists('VC_Extensions_FoldingCard')) {
    class VC_Extensions_FoldingCard{
        function __construct() {
            vc_map(array(
            "name" => esc_attr__("Folding Card", 'cq_allinone_vc'),
            "base" => "cq_vc_foldingcard",
            "class" => "cq_vc_foldingcard",
            "icon" => "cq_vc_foldingcard",
            "category" => esc_attr__('Sike Extensions', 'js_composer'),
            'description' => esc_attr__('Image, text and button', 'js_composer'),
            "params" => array(
              array(
                "type" => "attach_image",
                "heading" => esc_attr__("Cover Image:", "cq_allinone_vc"),
                "param_name" => "image",
                "value" => "",
                "description" => esc_attr__("Select image from media library.", "cq_allinone_vc")
              ),
              array(
                "type" => "dropdown",
                "edit_field_class" => "vc_col-xs-6 vc_column",
                "holder" => "",
                "heading" => esc_attr__("Resize the image?", "cq_allinone_vc"),
                "param_name" => "isresize",
                "value" => array("no", "yes (specify the image width below)"=>"yes"),
                "std" => "no",
                "description" => esc_attr__("Choose to resize the image or not, useful if your original image is too large.", "cq_allinone_vc")
              ),
              array(
                "type" => "textfield",
                "edit_field_class" => "vc_col-xs-6 vc_column",
                "heading" => esc_attr__("Resize image to this width", "cq_allinone_vc"),
                "param_name" => "imagewidth",
                "value" => "",
                "dependency" => Array('element' => "isresize", 'value' => array('yes')),
                "description" => esc_attr__("Default we will use the original image, specify a width. For example, 200 will resize the image to width 200. ", "cq_allinone_vc")
              ),
              array(
                "type" => "attach_image",
                "heading" => esc_attr__("Opened cover Image:", "cq_allinone_vc"),
                "param_name" => "openimage",
                "value" => "",
                "description" => esc_attr__("Select image from media library.", "cq_allinone_vc")
              ),
              array(
                "type" => "dropdown",
                "edit_field_class" => "vc_col-xs-6 vc_column",
                "holder" => "",
                "heading" => esc_attr__("Resize the opened image?", "cq_allinone_vc"),
                "param_name" => "isopenresize",
                "value" => array("no", "yes (specify the image width below)"=>"yes"),
                "std" => "no",
                "description" => esc_attr__("Choose to resize the image or not, useful if your original image is too large.", "cq_allinone_vc")
              ),
              array(
                "type" => "dropdown",
                "edit_field_class" => "vc_col-xs-6 vc_column",
                "holder" => "",
                "heading" => esc_attr__("Element width:", "cq_allinone_vc"),
                "param_name" => "elementsize",
                "value" => array("Small" => "small", "Medium" => "medium", "Large" => "large"),
                "std" => "medium",
                "description" => esc_attr__("Choose element width, the element height depends on the text, you can choose the width for the whole element.", "cq_allinone_vc")
              ),
              array(
                "type" => "textfield",
                "edit_field_class" => "vc_col-xs-6 vc_column",
                "heading" => esc_attr__("Resize opened image to this width", "cq_allinone_vc"),
                "param_name" => "openimagewidth",
                "value" => "",
                "dependency" => Array('element' => "isopenresize", 'value' => array('yes')),
                "description" => esc_attr__("Default we will use the original image, specify a width. For example, 200 will resize the image to width 200. ", "cq_allinone_vc")
              ),
              array(
                "type" => "colorpicker",
                "edit_field_class" => "vc_col-xs-6 vc_column",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Cover background color", 'cq_allinone_vc'),
                "param_name" => "bgcolor",
                "value" => "#222F46",
                "description" => esc_attr__("Customize cover background color.", 'cq_allinone_vc')
              ),
              array(
                "type" => "colorpicker",
                "edit_field_class" => "vc_col-xs-6 vc_column",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Opened cover background color", 'cq_allinone_vc'),
                "param_name" => "openbg",
                "value" => "",
                "description" => esc_attr__("Customize opened cover background color.", 'cq_allinone_vc')
              ),
              array(
                "type" => "colorpicker",
                "edit_field_class" => "vc_col-xs-6 vc_column",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Caption background color", 'cq_allinone_vc'),
                "param_name" => "captionbg",
                "value" => "",
                "description" => esc_attr__("Customize opened cover background color.", 'cq_allinone_vc')
              ),
              array(
                "type" => "dropdown",
                "edit_field_class" => "vc_col-xs-6 vc_column",
                "holder" => "",
                "heading" => esc_attr__("Whole element shape", "cq_allinone_vc"),
                "param_name" => "elementshape",
                "value" => array('Square' => 'square', 'Rounded' => 'rounded', 'Round' => 'round'),
                'std' => 'square',
                "description" => esc_attr__("", "cq_allinone_vc")
              ),
              array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "",
                "heading" => esc_attr__("Open the link as", "cq_allinone_vc"),
                "param_name" => "linktype",
                "value" => array(esc_attr__("Open lightbox (same image in large size)", "cq_allinone_vc") => "lightbox", esc_attr__("Custom lightbox, support different image or YouTube/Vimeo video too, specify URL below", "cq_allinone_vc") => "lightbox_custom", esc_attr__("Custom link, add link below", "cq_allinone_vc") => "url_custom",  esc_attr__("Do nothing", "cq_allinone_vc") => "none"),
                "std" => "none",
                "group" => "Link",
                "description" => esc_attr__("", "cq_allinone_vc")
              ),

              array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "",
                "heading" => esc_attr__("Select lightbox mode", "cq_allinone_vc"),
                "param_name" => "lightboxmode",
                "value" => array(esc_attr__("prettyPhoto", "cq_allinone_vc") => "prettyphoto", esc_attr__("boxer", "cq_allinone_vc") => "boxer"),
                "std" => "boxer",
                "group" => "Link",
                "dependency" => Array('element' => "linktype", 'value' => array('lightbox')),
                "description" => esc_attr__("", "cq_allinone_vc")
              ),
              array(
                'type' => 'vc_link',
                'heading' => esc_attr__( 'custom URL', 'cq_allinone_vc' ),
                'param_name' => 'custom_url',
                "dependency" => Array('element' => "linktype", 'value' => array('url_custom')),
                'group' => 'Link',
                'description' => esc_attr__( '', 'cq_allinone_vc' )
              ),
              array(
                'type' => 'textfield',
                'heading' => esc_attr__( 'lightbox URL, support image or YouTube/Vimeo video', 'cq_allinone_vc' ),
                'param_name' => 'lightbox_url',
                "dependency" => Array('element' => "linktype", 'value' => array('lightbox_custom')),
                'group' => 'Link',
                'description' => esc_attr__( 'Just copy and paste the page URL of the YouTube or Vimeo video, something like https://www.youtube.com/watch?v=pNSKQ9Qp36M&autoplay=1 or https://vimeo.com/127081676?autoplay=1. Add the autoplay=1 in the URL to auto play the video. Also support custom image link. ', 'cq_allinone_vc' )
              ),
              array(
                'type' => 'textfield',
                'heading' => esc_attr__( 'video width, default is 640', 'cq_allinone_vc' ),
                'param_name' => 'videowidth',
                "dependency" => Array('element' => "linktype", 'value' => array('lightbox_custom')),
                'value' => '640',
                'group' => 'Link',
                'description' => esc_attr__( '', 'cq_allinone_vc' )
              ),
              array(
                "type" => "attach_image",
                "heading" => esc_attr__("Lightbox Image:", "cq_allinone_vc"),
                "param_name" => "lightboximage",
                "value" => "",
                "dependency" => Array('element' => "lightboxmode", 'value' => array('boxer', 'prettyphoto')),
                "group" => "Link",
                "description" => esc_attr__("Select image from media library.", "cq_allinone_vc")
              ),
              array(
                "type" => "textfield",
                "heading" => esc_attr__("lightbox margin", "cq_allinone_vc"),
                "param_name" => "lightboxmargin",
                "value" => "",
                "dependency" => Array("element" => "lightboxmode", "value" => array("boxer")),
                "group" => "Link",
                "description" => esc_attr__("The margin of the lightbox image, default is 20 (in pixel).", "cq_allinone_vc")
              ),
              array(
                "type" => "dropdown",
                "holder" => "",
                "heading" => esc_attr__("Avatar type", "cq_allinone_vc"),
                "param_name" => "avatartype",
                "value" => array("Image" => "image", "Icon" => "icon", "None" => "none"),
                "std" => "icon",
                "group" => "Avatar",
                "description" => esc_attr__("", "cq_allinone_vc")
              ),
              array(
                "type" => "attach_image",
                "heading" => esc_attr__("Avatar image", "cq_allinone_vc"),
                "param_name" => "avatarimage",
                "value" => "",
                "group" => "Avatar",
                "dependency" => Array("element" => "avatartype", "value" => array("image")),
                "description" => esc_attr__("Select image from media library.", "cq_allinone_vc")
              ),
              array(
                "type" => "textfield",
                "edit_field_class" => "vc_col-xs-6 vc_column",
                "heading" => esc_attr__("Resize the avatar image?", "cq_allinone_vc"),
                "param_name" => "avatarwidth",
                "value" => "160",
                "group" => "Avatar",
                "dependency" => Array('element' => "avatartype", 'value' => array('image')),
                "description" => esc_attr__('The avatar will be displayed in circle. Default will be resized to be 160 (in pixel).', "cq_allinone_vc")
              ),
              array(
                'type' => 'dropdown',
                'heading' => esc_attr__( 'Icon library (optional icon before label)', 'js_composer' ),
                'value' => array(
                  esc_attr__( 'Entypo', 'js_composer' ) => 'entypo',
                  esc_attr__( 'Font Awesome', 'js_composer' ) => 'fontawesome',
                  esc_attr__( 'Open Iconic', 'js_composer' ) => 'openiconic',
                  esc_attr__( 'Typicons', 'js_composer' ) => 'typicons',
                  esc_attr__( 'Linecons', 'js_composer' ) => 'linecons',
                  esc_attr__( 'Material', 'js_composer' ) => 'material',
                ),
                'admin_label' => true,
                'param_name' => 'captionicon',
                "group" => "Avatar",
                "dependency" => Array('element' => "avatartype", 'value' => array('icon')),
                'description' => esc_attr__( 'Select icon library.', 'js_composer' ),
              ),
              array(
                'type' => 'iconpicker',
                'heading' => esc_attr__( 'Icon for the label (optional)', 'js_composer' ),
                'param_name' => 'icon_fontawesome',
                'value' => 'fa fa-user', // default value to backend editor admin_label
                'settings' => array(
                  'emptyIcon' => true, // default true, display an "EMPTY" icon?
                  'type' => 'fontawesome',
                  'iconsPerPage' => 100, // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
                ),
                'dependency' => array(
                  'element' => 'captionicon',
                  'value' => 'fontawesome',
                ),
                "group" => "Avatar",
                'description' => esc_attr__( 'Select icon from library.', 'js_composer' ),
              ),
              array(
                'type' => 'iconpicker',
                'heading' => esc_attr__( 'Icon', 'js_composer' ),
                'param_name' => 'icon_openiconic',
                'value' => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
                'settings' => array(
                  'emptyIcon' => false, // default true, display an "EMPTY" icon?
                  'type' => 'openiconic',
                  'iconsPerPage' => 100, // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                  'element' => 'captionicon',
                  'value' => 'openiconic',
                ),
                "group" => "Avatar",
                'description' => esc_attr__( 'Select icon from library.', 'js_composer' ),
              ),
              array(
                'type' => 'iconpicker',
                'heading' => esc_attr__( 'Icon', 'js_composer' ),
                'param_name' => 'icon_typicons',
                'value' => 'typcn typcn-adjust-brightness', // default value to backend editor admin_label
                'settings' => array(
                  'emptyIcon' => false, // default true, display an "EMPTY" icon?
                  'type' => 'typicons',
                  'iconsPerPage' => 100, // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                  'element' => 'captionicon',
                  'value' => 'typicons',
                ),
                "group" => "Avatar",
                'description' => esc_attr__( 'Select icon from library.', 'js_composer' ),
              ),
              array(
                'type' => 'iconpicker',
                'heading' => esc_attr__( 'Icon', 'js_composer' ),
                'param_name' => 'icon_entypo',
                'value' => 'entypo-icon entypo-icon-user', // default value to backend editor admin_label
                'settings' => array(
                  'emptyIcon' => false, // default true, display an "EMPTY" icon?
                  'type' => 'entypo',
                  'iconsPerPage' => 100, // default 100, how many icons per/page to display
                ),
                "group" => "Avatar",
                'dependency' => array(
                  'element' => 'captionicon',
                  'value' => 'entypo',
                ),
              ),
              array(
                'type' => 'iconpicker',
                'heading' => esc_attr__( 'Icon', 'js_composer' ),
                'param_name' => 'icon_linecons',
                'value' => 'vc_li vc_li-heart', // default value to backend editor admin_label
                'settings' => array(
                  'emptyIcon' => false, // default true, display an "EMPTY" icon?
                  'type' => 'linecons',
                  'iconsPerPage' => 100, // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                  'element' => 'captionicon',
                  'value' => 'linecons',
                ),
                "group" => "Avatar",
                'description' => esc_attr__( 'Select icon from library.', 'js_composer' ),
              ),
              array(
                'type' => 'iconpicker',
                'heading' => esc_attr__( 'Icon', 'js_composer' ),
                'param_name' => 'icon_material',
                'value' => 'vc-material vc-material-cake',
                // default value to backend editor admin_label
                'settings' => array(
                  'emptyIcon' => false,
                  // default true, display an "EMPTY" icon?
                  'type' => 'material',
                  'iconsPerPage' => 100,
                  // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                  'element' => 'captionicon',
                  'value' => 'material',
                ),
                "group" => "Avatar",
                'description' => esc_attr__( 'Select icon from library.', 'js_composer' ),
              ),
              array(
                "type" => "colorpicker",
                "edit_field_class" => "vc_col-xs-6 vc_column",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Avatar Background color", 'cq_allinone_vc'),
                "param_name" => "iconbg",
                "value" => "",
                "group" => "Avatar",
                "dependency" => Array("element" => "avatartype", "value" => array("icon", "image")),
                "description" => esc_attr__("Background color for the avatar.", 'cq_allinone_vc')
              ),
              array(
                "type" => "textfield",
                "edit_field_class" => "vc_col-xs-6 vc_column",
                "heading" => esc_attr__("Icon font size", "cq_allinone_vc"),
                "param_name" => "iconsize",
                "value" => "",
                "group" => "Avatar",
                "dependency" => Array("element" => "avatartype", "value" => array("icon")),
                "description" => esc_attr__("Default is 1.5em. You can customize it with other value, like 14px or 1.2em etc.", "cq_allinone_vc")
              ),
              array(
                "type" => "textfield",
                "edit_field_class" => "vc_col-xs-6 vc_column",
                "heading" => esc_attr__("Avatar size", "cq_allinone_vc"),
                "param_name" => "avatarsize",
                "value" => "",
                "group" => "Avatar",
                "dependency" => Array("element" => "avatartype", "value" => array("icon", "image")),
                "description" => esc_attr__("Default is 80 (in pixel). You can customize it with other value, like 120 etc.", "cq_allinone_vc")
              ),
              array(
                "type" => "colorpicker",
                "edit_field_class" => "vc_col-xs-6 vc_column",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Icon color", 'cq_allinone_vc'),
                "param_name" => "iconcolor",
                "value" => "",
                "group" => "Avatar",
                "dependency" => Array("element" => "avatartype", "value" => array("icon")),
                "description" => esc_attr__("Color for the avatar icon.", 'cq_allinone_vc')
              ),

              array(
                "type" => "textfield",
                "heading" => esc_attr__("Title under the avatar (optional)", "cq_allinone_vc"),
                "param_name" => "title",
                "value" => "",
                "group" => "Text",
                "description" => esc_attr__("", "cq_allinone_vc")
              ),
              array(
                "type" => "textfield",
                "edit_field_class" => "vc_col-xs-6 vc_column",
                "heading" => esc_attr__("Title font size", "cq_allinone_vc"),
                "param_name" => "titlesize",
                "value" => "",
                "group" => "Text",
                "description" => esc_attr__("Default is 1.5em. You can customize it with other value, like 14px or 1.2em etc.", "cq_allinone_vc")
              ),
              array(
                "type" => "colorpicker",
                "edit_field_class" => "vc_col-xs-6 vc_column",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Title color", 'cq_allinone_vc'),
                "param_name" => "titlecolor",
                "value" => "Avatar title",
                "group" => "Text",
                "description" => esc_attr__("Default is white.", 'cq_allinone_vc')
             ),
             array(
                "type" => "textfield",
                "heading" => esc_attr__("Sub title under the title (optional)", "cq_allinone_vc"),
                "param_name" => "subtitle",
                "value" => "Sub title",
                "group" => "Text",
                "description" => esc_attr__("", "cq_allinone_vc")
              ),
              array(
                "type" => "textfield",
                "edit_field_class" => "vc_col-xs-6 vc_column",
                "heading" => esc_attr__("Font size for the sub title", "cq_allinone_vc"),
                "param_name" => "subtitlesize",
                "value" => "",
                "group" => "Text",
                "description" => esc_attr__("", "cq_allinone_vc")
              ),
              array(
                "type" => "colorpicker",
                "edit_field_class" => "vc_col-xs-6 vc_column",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("sub title color", 'cq_allinone_vc'),
                "param_name" => "subtitlecolor",
                "value" => "",
                "group" => "Text",
                "description" => esc_attr__("", 'cq_allinone_vc')
              ),
              array(
                "type" => "textfield",
                "heading" => esc_attr__("Main label (name) for the cover (optional)", "cq_allinone_vc"),
                "param_name" => "mainlabel",
                "value" => "John Smith",
                "group" => "Text",
                "description" => esc_attr__("", "cq_allinone_vc")
              ),
              array(
                "type" => "textfield",
                "edit_field_class" => "vc_col-xs-6 vc_column",
                "heading" => esc_attr__("Font size for the main label", "cq_allinone_vc"),
                "param_name" => "mainlabelsize",
                "value" => "",
                "group" => "Text",
                "description" => esc_attr__("", "cq_allinone_vc")
              ),
              array(
                "type" => "colorpicker",
                "edit_field_class" => "vc_col-xs-6 vc_column",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Color for the main label", 'cq_allinone_vc'),
                "param_name" => "mainlabelcolor",
                "value" => "",
                "group" => "Text",
                "description" => esc_attr__("", 'cq_allinone_vc')
              ),
              array(
                "type" => "textfield",
                "heading" => esc_attr__("Title for the opened caption (optional)", "cq_allinone_vc"),
                "param_name" => "captiontitle",
                "value" => "Caption title",
                "group" => "Text",
                "description" => esc_attr__("", "cq_allinone_vc")
              ),
              array(
                "type" => "textfield",
                "edit_field_class" => "vc_col-xs-6 vc_column",
                "heading" => esc_attr__("Font size for the caption title", "cq_allinone_vc"),
                "param_name" => "captiontitlesize",
                "value" => "",
                "group" => "Text",
                "description" => esc_attr__("", "cq_allinone_vc")
              ),
              array(
                "type" => "colorpicker",
                "edit_field_class" => "vc_col-xs-6 vc_column",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Color for the caption title", 'cq_allinone_vc'),
                "param_name" => "captiontitlecolor",
                "value" => "",
                "group" => "Text",
                "description" => esc_attr__("", 'cq_allinone_vc')
              ),
              array(
                "type" => "textarea_html",
                "heading" => esc_attr__("Caption content", "cq_allinone_vc"),
                "param_name" => "content",
                "value" => "I am text block. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.",
                "group" => "Text",
                "description" => esc_attr__("", "cq_allinone_vc")
              ),
              array(
                "type" => "textfield",
                "heading" => esc_attr__("Button text", "cq_allinone_vc"),
                "param_name" => "buttontext",
                "value" => "",
                'group' => 'Button',
                "description" => esc_attr__("Optional button under the title and description.", "cq_allinone_vc")
              ),
              array(
                 "type" => "dropdown",
                 "edit_field_class" => "vc_col-xs-6 vc_column",
                 "holder" => "",
                 "heading" => esc_attr__("Button color", "cq_allinone_vc"),
                 "param_name" => "buttoncolor",
                 "value" => array('Blue' => 'blue', 'Turquoise' => 'turquoise', 'Pink' => 'pink', 'Violet' => 'violet', 'Peacoc' => 'peacoc', 'Chino' => 'chino', 'Vista Blue' => 'vista_blue', 'Black' => 'black', 'Grey' => 'grey', 'Orange' => 'orange', 'Sky' => 'sky', 'Green' => 'green', 'Sandy brown' => 'sandy_brown', 'Purple' => 'purple', 'White' => 'white'),
                'std' => 'blue',
                'group' => 'Button',
                "description" => esc_attr__("", "cq_allinone_vc")
              ),
              array(
                 "type" => "dropdown",
                 "edit_field_class" => "vc_col-xs-6 vc_column",
                 "holder" => "",
                 "heading" => esc_attr__("Button size", "cq_allinone_vc"),
                 "param_name" => "buttonsize",
                 "value" => array('Mini' => 'xs', 'Small' => 'sm', 'Large' => 'lg'),
                 'std' => 'xs',
                 'group' => 'Button',
                 "description" => esc_attr__("", "cq_allinone_vc")
              ),
              array(
                "type" => "dropdown",
                "edit_field_class" => "vc_col-xs-6 vc_column",
                "holder" => "",
                "heading" => esc_attr__("Button shape", "cq_allinone_vc"),
                "param_name" => "buttonshape",
                "value" => array('Rounded' => 'rounded', 'Square' => 'square', 'Round' => 'round'),
                'std' => 'rounded',
                'group' => 'Button',
                "description" => esc_attr__("", "cq_allinone_vc")
              ),
              array(
                "type" => "dropdown",
                "edit_field_class" => "vc_col-xs-6 vc_column",
                "holder" => "",
                "heading" => esc_attr__("Button alignment", "cq_allinone_vc"),
                "param_name" => "align",
                "value" => array('Inline' => 'inline', 'Left' => 'left', 'Center' => 'center', 'Right' => 'right'),
                'std' => 'center',
                'group' => 'Button',
                "description" => esc_attr__("", "cq_allinone_vc")
              ),
              array(
                "type" => "vc_link",
                "edit_field_class" => "vc_col-xs-6 vc_column",
                "heading" => esc_attr__("URL (Optional link for the button)", "cq_allinone_vc"),
                "param_name" => "buttonlink",
                "value" => "",
                'group' => 'Button',
                "description" => esc_attr__("", "cq_allinone_vc")
              ),
              array(
                "type" => "textfield",
                "edit_field_class" => "vc_col-xs-6 vc_column",
                "heading" => esc_attr__("Extra class name", "cq_allinone_vc"),
                "param_name" => "extraclass",
                "value" => "",
                "description" => esc_attr__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "cq_allinone_vc")
              ),
              array(
                "type" => "css_editor",
                "heading" => esc_attr__( "CSS", "cq_allinone_vc" ),
                "param_name" => "css",
                "description" => esc_attr__("It's recommended to use this to customize the padding/margin only.", "cq_allinone_vc"),
                "group" => esc_attr__( "Design options", "cq_allinone_vc" ),
             )


           )
        ));

        add_shortcode('cq_vc_foldingcard', array($this,'cq_vc_foldingcard_func'));

      }

      function cq_vc_foldingcard_func($atts, $content=null, $tag) {
          $image = $imagewidth = $openimage = $openimagewidth = $align = $title = $subtitle = $titlecolor = $titlesize = $elementshape = $captionicon = $subtitlesize = $subtitlecolor = $avatarimage = $iconbg = $iconcolor = $iconsize = $avatarwidth = $buttoncolor = $buttontext = $buttonshape = $buttonsize = $buttonlink = $bgcolor = $openbg = $captionbg = $elementsize = $avatarsize = $avatartype = $mainlabel = $mainlabelsize = $mainlabelcolor = $captiontitle = $captiontitlesize = $captiontitlecolor = $css_class = $css = $custom_url = $linktype = $lightboxmargin = $lightboximage = $lightboxmode = $lightbox_url = "";
          $icon_fontawesome = $icon_openiconic = $icon_typicons = $icon_entypo = $icon_linecons = $icon_pixelicons = $icon_material = '';
          extract(shortcode_atts(array(
            "elementsize" => "medium",
            "avatarsize" => "",
            "avatartype" => "icon",
            "image" => "",
            "openimage" => "",
            "avatarimage" => "",
            "iconbg" => "",
            "iconcolor" => "",
            "iconsize" => "",
            "avatarwidth" => "",
            "buttontext" => "",
            "buttoncolor" => "blue",
            "buttonsize" => "xs",
            "buttonshape" => "rounded",
            "buttonstyle" => "modern",
            "buttonlink" => "",
            "align" => "center",
            "bgcolor" => "",
            "openbg" => "",
            "captionbg" => "",
            "subtitlesize" => "",
            "subtitlecolor" => "",
            "mainlabel" => "John Smith",
            "mainlabelsize" => "",
            "mainlabelcolor" => "",
            "captiontitle" => "Caption Title",
            "captiontitlesize" => "",
            "captiontitlecolor" => "",
            "imagewidth" => "",
            "openimagewidth" => "",
            "titlecolor" => "",
            "titlesize" => "",
            "title" => "Avatar title",
            "subtitle" => "Sub title",
            "elementshape" => "square",
            "captionicon" => "entypo",
            "icon_fontawesome" => 'fa fa-share',
            "icon_openiconic" => 'vc-oi vc-oi-dial',
            "icon_typicons" => 'typcn typcn-adjust-brightness',
            "icon_entypo" => 'entypo-icon entypo-icon-user',
            "icon_linecons" => 'vc_li vc_li-heart',
            "icon_material" => 'vc-material vc-material-cake',
            "isresize" => "no",
            "linktype" => "none",
            "lightboxmargin" => "",
            "lightboximage" => "",
            "lightbox_url" => "",
            "lightboxmode" => "boxer",
            "videowidth" => "640",
            "custom_url" => "",
            "css" => "",
            "extraclass" => ""
          ), $atts));


          $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ''), 'cq_vc_foldingcard', $atts);


          $content = wpb_js_remove_wpautop($content); // fix unclosed/unwanted paragraph tags in $content

          $imagewidth = intval($imagewidth);
          $attachment = get_post($image);
          $imageurl = wp_get_attachment_image_src($image, 'full');
          $resizedimage = $imageurl[0];
          if($imagewidth>0){
              if(function_exists('wpb_resize')){
                  $resizedimage = wpb_resize($image, null, $imagewidth, null);
                  $resizedimage = $resizedimage['url'];
                  if($resizedimage=="") $resizedimage = $imageurl[0];
              }
          }

          $openimagewidth = intval($openimagewidth);
          $openattachment = get_post($openimage);
          $openimageurl = wp_get_attachment_image_src($openimage, 'full');
          $openresizedimage = $openimageurl[0];
          if($openimagewidth>0){
              if(function_exists('wpb_resize')){
                  $openresizedimage = wpb_resize($openimage, null, $openimagewidth, null);
                  $openresizedimage = $openresizedimage['url'];
                  if($openresizedimage=="") $openresizedimage = $openimageurl[0];
              }
          }



        $avatarimagearr = wp_get_attachment_image_src(trim($avatarimage), 'full');
        $avatar_image_temp = $avatarimage_url = "";
        $avatar_full_image = $avatarimagearr[0];
        $avatarimage_url = $avatar_full_image;
        if($avatarwidth!=""){
            if(function_exists('wpb_resize')){
                $avatar_image_temp = wpb_resize($avatarimage, null, $avatarwidth*2, $avatarwidth*2, true);
                $avatarimage_url = $avatar_image_temp['url'];
                if($avatarimage_url=="") $avatarimage_url = $avatar_full_image;
            }
        }


        wp_register_style( 'vc-extensions-morecaption-style', plugins_url('css/style.css', __FILE__) );
        wp_enqueue_style( 'vc-extensions-morecaption-style' );

        wp_register_style('formstone-lightbox', plugins_url('../videocover/css/lightbox.css', __FILE__));
        wp_enqueue_style('formstone-lightbox');
        wp_register_script('fs.boxer', plugins_url('../depthmodal/js/jquery.fs.boxer.min.js', __FILE__), array('jquery'));
        wp_enqueue_script('fs.boxer');
        wp_register_style('fs.boxer', plugins_url('../depthmodal/css/jquery.fs.boxer.css', __FILE__));
        wp_enqueue_style('fs.boxer');

        wp_register_style('prettyphoto', vc_asset_url( 'lib/prettyphoto/css/prettyPhoto.min.css' ), array(), WPB_VC_VERSION );
        wp_enqueue_style('prettyphoto');

        wp_register_script('formstone-lightbox', plugins_url('../videocover/js/lightbox.js', __FILE__));
        wp_enqueue_script('formstone-lightbox');

        wp_register_script('prettyphoto', vc_asset_url( 'lib/prettyphoto/js/prettyphoto.min.js' ), array(), WPB_VC_VERSION );
        wp_enqueue_script('prettyphoto');


        wp_register_script('vc-extensions-morecaption-script', plugins_url('js/init.min.js', __FILE__), array("jquery", "fs.boxer", "formstone-lightbox", "prettyphoto"));
        wp_enqueue_script('vc-extensions-morecaption-script');

        $output = "";

        vc_icon_element_fonts_enqueue($captionicon);

        $custom_url = vc_build_link($custom_url);

        $output .= '<div class="cq-foldingcard cq-foldingcard-size-'.$elementsize.' cq-foldingcard-shape-'.$elementshape.' '.$extraclass.' '.$css_class.'" data-iconcolor="'.$iconcolor.'" data-lightboxmargin="'.$lightboxmargin.'" data-iconbg="'.$iconbg.'" data-bgcolor="'.$bgcolor.'">';

        $gallery_rand_id = "prettyPhoto";

        if($linktype=="lightbox"){
            if($lightboxmode=="prettyphoto"){
                  $output .= '<a href="'.wp_get_attachment_image_src($lightboximage, 'full')[0].'" data-rel="'.$gallery_rand_id.'" class="cq-foldingcard-link cq-foldingcard-prettyphoto" rel="'.$gallery_rand_id.'" data-linktype="'.$linktype.'">';
            }else{
                  $output .= '<a href="'.wp_get_attachment_image_src($lightboximage, 'full')[0].'" class="cq-foldingcard-link cq-foldingcard-lightbox" data-linktype="'.$linktype.'">';
             }
        }else if($linktype=="lightbox_custom"){
            if(isset($lightbox_url)){
                $output .= '<a href="'.$lightbox_url.'" class="cq-foldingcard-link cq-foldingcard-lightbox" data-linktype="'.$linktype.'" data-videowidth="'.$videowidth.'">';
            }
        }else if($linktype=="url_custom"){
            if(isset($custom_url['url'])){
                $output .= '<a href="'.$custom_url['url'].'" class="cq-foldingcard-link" title="'.$custom_url["title"].'" target="'.$custom_url["target"].'">';
            }
        }


        $output .= '<div class="cq-foldingcard-section">';
        $output .= '<div class="cq-foldingcard-card">';
        $output .= '<div class="cq-foldingcard-flipcard">';
        $output .= '<div class="cq-foldingcard-cardcontainer">';
          $output .= '<div class="cq-foldingcard-cardfront" style="background-image:url('.$resizedimage.');background-color:'.$bgcolor.';">';
            $output .= '<div class="cq-foldingcard-cardfront-top">';
                if($avatartype != "none"){
                  $output .= '<div class="cq-foldingcard-avatar" style="background-color:'.$iconbg.';background-image:url('.$avatarimage_url.');width:'.$avatarsize.'px;height:'.$avatarsize.'px;line-height:'.$avatarsize.'px;">';
                  if($avatartype == "icon"){
                  $output .= '<i class="cq-foldingcard-icon '.esc_attr(${'icon_' . $captionicon}).'" style="font-size:'.$iconsize.';color:'.$iconcolor.';"></i>';
                  }
                  $output .= '</div>';
                }
                if($title != ""){
                   $output .= '<h4 class="cq-foldingcard-title" style="font-size:'.$titlesize.';color:'.$titlecolor.'">'.$title.'</h4>';
                }
                if($subtitle != ""){
                    $output .= '<span class="cq-foldingcard-label" style="font-size:'.$subtitlesize.';color:'.$subtitlecolor.'">'.$subtitle.'</span>';
                }

            $output .= '</div>';

          $output .= '<div class="cq-foldingcard-cardfront-bottom">';
          if($mainlabel != ""){
            $output .= '<p class="cq-foldingcard-name" style="font-size:'.$mainlabelsize.';color:'.$mainlabelcolor.'">'.$mainlabel.'</p>';
          }
          $output .= '</div>';
        $output .= '</div>';
        $output .= '<div class="cq-foldingcard-cardback" style="background-image:url('.$openresizedimage.');background-color:'.$openbg.';">';
        $output .= '</div>';

        $output .= '</div>';
        $output .= '</div>';

        $output .= '<div class="cq-foldingcard-caption" style="background-color:'.$captionbg.';">';
        $output .= '<div class="cq-foldingcard-caption-container">';

        if($captiontitle != ""){
            $output .= '<h3 class="cq-foldingcard-captiontitle" style="font-size:'.$captiontitlesize.';color:'.$captiontitlecolor.'">'.$captiontitle.'</h3>';
        }
        if($content != ""){
            $output .= '<div class="cq-foldingcard-content">';
            $output .= $content;
            $output .= '</div>';
        }

        if($buttontext!=""){
            $output .= do_shortcode('[vc_btn title="'.$buttontext.'" color="'.$buttoncolor.'" style="'.$buttonstyle.'" shape="'.$buttonshape.'" link="'.$buttonlink.'" align="'.$align.'" size="'.$buttonsize.'"]');
        }

        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';

        if($linktype=="lightbox" || $linktype=="lightbox_custom" || $linktype=="url_custom"){
          $output .= '</a>';
        }


        $output .= '</div>';
        return $output;

      }

  }

}

?>
