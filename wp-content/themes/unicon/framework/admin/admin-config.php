<?php

/* ------------------------------------------------------------------------ */
/* Redux Configuration
/* ------------------------------------------------------------------------ */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "minti_data";

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name'          => 'minti_data',            // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'      => $theme->get('Name'),     // Name that appears at the top of your panel
        'display_version'   => $theme->get('Version'),  // Version that appears at the top of your panel
        'menu_type'         => 'submenu',                  //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'    => false,                    // Show the sections below the admin menu item or not
        'menu_title'        => __('Theme Options', 'unicon'),
        'page_title'        => __('Theme Options', 'unicon'),
        'save_defaults'     => true,
        'async_typography'  => true,                    // Use a asynchronous font on the front end or font string
        'admin_bar'         => false,                    // Show the panel pages on the admin bar
        'global_variable'   => 'minti_data',                      // Set a different name for your global variable other than the opt_name
        'dev_mode'          => false,                    // Show the time the page took to load, etc
        'customizer'        => false,                    // Enable basic customizer support
        'page_slug'         => 'minti_options',
        'system_info'       => false,
        'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
        'use_cdn'           => false,
    );

    Redux::setArgs( $opt_name, $args );

    /* Set Extensions /-------------------------------------------------- */
    Redux::setExtensions( $opt_name, dirname( __FILE__ ) . '/extensions/' );

    /* General /--------------------------------------------------------- */
    Redux::setSection( $opt_name, array(
        'title'     => __('General', 'unicon'),
        'icon'      => 'el-icon-home',
        'fields'    => array(

            array(
                'id'        => 'general-global',
                'type'      => 'info',
                'desc'      => __('Global Settings', 'unicon')
            ),

            array(
                'id'       => 'switch_comments',
                'type'     => 'switch', 
                'title'    => __('Global Page Comments', 'unicon'),
                'subtitle' => __('You can globally disable the Page Comments (not Blog). Page specific Settings get overwritten.', 'unicon'),
                'default'  => false,
            ),

            array(
                'id'        => 'general-favicons',
                'type'      => 'info',
                'desc'      => __('Favicons', 'unicon')
            ),

            array(
                'id'       => 'media_favicon',
                'type'     => 'media', 
                'url'      => false,
                'title'    => __('Favicon Upload (16x16)', 'unicon'),
                'subtitle' => __('Upload your Favicon (16x16px ico/png - use <a href="http://www.favicon.cc/" target="_blank">favicon.cc</a> to make sure its fully compatible)', 'unicon'),
            ),

            array(
                'id'       => 'media_favicon_iphone',
                'type'     => 'media', 
                'url'      => false,
                'title'    => __('Apple iPhone Icon Upload (57x57)', 'unicon'),
                'subtitle' => __('Upload your Apple Touch Icon (57x57px png)', 'unicon'),
            ),

            array(
                'id'       => 'media_favicon_iphone_retina',
                'type'     => 'media', 
                'url'      => false,
                'title'    => __('Apple iPhone Retina Icon Upload (120x120)', 'unicon'),
                'subtitle' => __('Upload your Apple Touch Retina Icon (120x120 png)', 'unicon'),
            ),

            array(
                'id'       => 'media_favicon_ipad',
                'type'     => 'media', 
                'url'      => false,
                'title'    => __('Apple iPad Mini Icon Upload (76x76)', 'unicon'),
                'subtitle' => __('Upload your Apple iPad Mini Icon (76x76px png)', 'unicon'),
            ),

            array(
                'id'       => 'media_favicon_ipad_retina',
                'type'     => 'media', 
                'url'      => false,
                'title'    => __('Apple iPad Retina Icon Upload (152x152)', 'unicon'),
                'subtitle' => __('Upload your Apple Touch Retina Icon (152x152 png)', 'unicon'),
            ),

            array(
                'id'        => 'general-vc',
                'type'      => 'info',
                'desc'      => __('Advanced Visual Composer Settings', 'unicon')
            ),

            array(
                'id'       => 'switch_vc_elements',
                'type'     => 'switch', 
                'title'    => __('Enable all VC Elements?', 'unicon'),
                'subtitle' => __('You can enable all default VC Elements here. Disabled by default for better overview.', 'unicon'),
                'default'  => false,
            ),


        ),
    ) );

    /* Layout /--------------------------------------------------------- */
    Redux::setSection( $opt_name, array(
        'title'     => __('Layout', 'unicon'),
        'icon'      => 'el-icon-th',
        'fields'    => array(

            array(
                'id'        => 'layout-responsive',
                'type'      => 'info',
                'desc'      => __('Mobile', 'unicon'),
            ),

            // array(
            //     'id'       => 'switch_responsive',
            //     'type'     => 'switch', 
            //     'title'    => __('Responsive Layout', 'unicon'),
            //     'subtitle'  => __('Enable / Disable Site Responsiveness.', 'unicon'),
            //     'description'  => __('<strong>Note:</strong> If you use Visual Composer you also need to disable the responsiveness in Settings > Visual Composer.', 'unicon'),
            //     'default'  => true,
            // ),

            array(
                'id'       => 'switch_zoom',
                'type'     => 'switch', 
                'title'    => __('Zoom on Mobile Devices', 'unicon'),
                'subtitle'  => __('Enable / Disable Pinch-to-Zoom on mobile devices.', 'unicon'),
                'default'  => false,
            ),

            array(
                'id'        => 'layout-general',
                'type'      => 'info',
                'desc'      => __('General Options & Layout', 'unicon')
            ),

            array(
                'id'       => 'select_backtotop',
                'type'     => 'select',
                'title'    => __('Back to Top Button', 'unicon'), 
                'subtitle' => __('Enable / Disable Back to Top Button', 'unicon'),
                'options'  => array(
                    'all' => 'Enable on all Devices',
                    'desktop' => 'Enable on Desktop only',
                    'mobile' => 'Enable on Mobile only',
                    'hide' => 'Disable',
                ),
                'default'  => 'all',
            ),

            array(
                'id'       => 'switch_smoothscroll',
                'type'     => 'switch', 
                'title'    => __('Smooth Scroll', 'unicon'),
                'subtitle' => __('Enable / Disable Smooth Scroll', 'unicon'),
                'default'  => false,
            ),

            array(
                'id'       => 'select_layoutstyle',
                'type'     => 'select',
                'title'    => __('Layout Style', 'unicon'), 
                'subtitle' => __('Choose your Layout Style', 'unicon'),
                'options'  => array(
                    'fullwidth' => 'Fullwidth',
                    'boxed' => 'Boxed Layout',
                ),
                'default'  => 'fullwidth',
            ),

            array(
                'id'        => 'style_bodybg',
                'type'      => 'background',
                //'output'    => array('body'),
                'transparent' => false,
                'background-attachment' => false,
                'background-position' => false,
                'preview' => false,
                'title'     => __('Default Background for Boxed Layout', 'unicon'),
                'subtitle'  => __('Define the default Background when your Layout Mode is set to Boxed Layout', 'unicon'),
                'required'  => array('select_layoutstyle', "=", 'boxed'),
            ),

            // array(
            //     'id'       => 'switch_simpleselect',
            //     'type'     => 'switch', 
            //     'title'    => __('Custom Select / Dropdown Styling', 'unicon'),
            //     'subtitle' => __('Enable / Disable select field styling. Set this to OFF if you are using WooCommerce.', 'unicon'),
            //     'default'  => false,
            // ),

        ),
    ) );

    /* Styling /--------------------------------------------------------- */
    Redux::setSection( $opt_name, array(
        'title'     => __('Styling', 'unicon'),
        'icon'      => 'el-icon-brush',
        'fields'    => array(

            array(
                'id'        => 'styling-main',
                'type'      => 'info',
                'desc'      => __('General', 'unicon'),
            ),

            array(
                'id'=>'color_accent',
                'type' => 'color',
                'title' => __('Accent Color', 'unicon'),
                'subtitle' => __('Default: #1cbac8', 'unicon'),
                'default' => '#1cbac8',
                'transparent' => false,
                'validate' => 'color',
            ),

            array(
                'id'        => 'styling-links',
                'type'      => 'info',
                'desc'      => __('Links', 'unicon'),
            ),

            array(
                'id'=>'color_link',
                'type' => 'color',
                'title' => __('Link Color', 'unicon'),
                'subtitle' => __('Default: #1cbac8', 'unicon'),
                'default' => '#1cbac8',
                'transparent' => false,
                'validate' => 'color',
            ),

            array(
                'id'=>'color_hover',
                'type' => 'color',
                'title' => __('Link Hover Color', 'unicon'),
                'subtitle' => __('Default: #333333', 'unicon'),
                'default' => '#333333',
                'transparent' => false,
                'validate' => 'color',
            ),

            array(
                'id'        => 'styling-topbar',
                'type'      => 'info',
                'desc'      => __('Topbar', 'unicon'),
                'required' => array( 
                    array('header_layout', "=", 'v2') 
                )
            ),

            array(
                'id'=>'color_topbar_bg',
                'type' => 'color',
                'title' => __('Topbar Background Color', 'unicon'),
                'subtitle' => __('Default: #f5f5f5', 'unicon'),
                'default' => '#f5f5f5',
                'transparent' => false,
                'validate' => 'color',
                'required' => array( 
                    array('header_layout', "=", 'v2') 
                )
            ),

            array(
                'id'=>'color_topbar_text',
                'type' => 'color',
                'title' => __('Topbar Text Color', 'unicon'),
                'subtitle' => __('Default: #777777', 'unicon'),
                'default' => '#777777',
                'transparent' => false,
                'validate' => 'color',
                'required' => array( 
                    array('header_layout', "=", 'v2') 
                )
            ),

            array(
                'id'=>'color_topbar_link',
                'type' => 'color',
                'title' => __('Topbar Link Color', 'unicon'),
                'subtitle' => __('Default: #999999', 'unicon'),
                'default' => '#999999',
                'transparent' => false,
                'validate' => 'color',
                'required' => array( 
                    array('header_layout', "=", 'v2') 
                )
            ),

            array(
                'id'=>'color_topbar_linkhover',
                'type' => 'color',
                'title' => __('Topbar Link Hover Color', 'unicon'),
                'subtitle' => __('Default: #333333', 'unicon'),
                'default' => '#333333',
                'transparent' => false,
                'validate' => 'color',
                'required' => array( 
                    array('header_layout', "=", 'v2') 
                )
            ),

            array(
                'id'        => 'styling-links',
                'type'      => 'info',
                'desc'      => __('Header', 'unicon'),
            ),

            array(
                'id'=>'color_headerbg',
                'type' => 'color',
                'title' => __('Header Background Color', 'unicon'),
                'subtitle' => __('Default: #ffffff', 'unicon'),
                'default' => '#ffffff',
                'transparent' => false,
                'validate' => 'color',
            ),

            array(
                'id'       => 'media_headerbg',
                'type'     => 'media', 
                'url'      => false,
                'title'    => __('Header Background Image', 'unicon'),
                'description' => __('Optional: Upload a Background Image for the Header part. Width 1200px height as defined in the settings.', 'unicon'),
            ),

            array(
                'id'=>'color_headericon',
                'type' => 'color',
                'title' => __('Header Icon Color', 'unicon'),
                'subtitle' => __('Default: #bbbbbb', 'unicon'),
                'default' => '#bbbbbb',
                'transparent' => false,
                'validate' => 'color',
            ),

            array(
                'id'=>'color_headericonhover',
                'type' => 'color',
                'title' => __('Header Icon Hover Color', 'unicon'),
                'subtitle' => __('Default: #999999', 'unicon'),
                'default' => '#999999',
                'transparent' => false,
                'validate' => 'color',
            ),

            array(
                'id'=>'color_searchinput',
                'type' => 'color',
                'title' => __('Search Input Color', 'unicon'),
                'subtitle' => __('Default: #666666', 'unicon'),
                'default' => '#666666',
                'transparent' => false,
                'validate' => 'color',
            ),

            array(
                'id'=>'color_navdivider',
                'type' => 'color',
                'title' => __('Header Divider / Border Color', 'unicon'),
                'subtitle' => __('Default: #efefef', 'unicon'),
                'default' => '#efefef',
                'transparent' => false,
                'validate' => false,
            ),

            array(
                'id'=>'font_slogan',
                'type' => 'typography', 
                'title' => __('Slogan', 'unicon'),
                'compiler'=>false,
                'google'=>true,
                'font-backup'=>false,
                'subsets'=>true,
                'font-size'=>true,
                'line-height'=>false,
                'word-spacing'=>false,
                'letter-spacing'=>false,
                'text-align'=>false,
                'color'=>true,
                'preview'=>false,
                //'output' => array('body'),
                'units'=>'px',
                'subtitle'=> __('Select your Slogan Color. <br />Default: 20px, #777777', 'unicon'),
                'default'=> array(
                    'color'=>"#777777",
                    'font-family'=>'Open Sans', 
                    'font-size'=>'20px',
                    'font-style'=>'400',
                    'font-weight'=>'400',
                ),
                'required' => array( 
                    array('header_layout', "=", 'v3') 
                )
            ),

            array(
                'id'        => 'styling-navigation',
                'type'      => 'info',
                'desc'      => __('Navigation', 'unicon'),
            ),

            array(
                'id'=>'font_nav',
                'type' => 'typography', 
                'title' => __('Navigation Link', 'unicon'),
                'compiler'=>false,
                'google'=>true,
                'font-backup'=>false,
                'subsets'=>true,
                'font-size'=>true,
                'line-height'=>false,
                'word-spacing'=>false,
                'letter-spacing'=>false,
                'text-align'=>false,
                'color'=>true,
                'preview'=>false,
                //'output' => array('body'),
                'units'=>'px',
                'subtitle'=> __('Select your Navigation Font. <br />Default: 13px, 700, #777777', 'unicon'),
                'default'=> array(
                    'color'=>"#777777",
                    'font-family'=>'Montserrat', 
                    'font-size'=>'13px',
                    'font-style'=>'700',
                    'font-weight'=>'700',
                )
            ),

            array(
                'id'=>'color_navlinkhover',
                'type' => 'color',
                'title' => __('Navigation Link Hover Color', 'unicon'),
                'subtitle' => __('Default: #1cbac8', 'unicon'),
                'default' => '#1cbac8',
                'transparent' => false,
                'validate' => 'color',
            ),

            array(
                'id'=>'color_navlinkactive',
                'type' => 'color',
                'title' => __('Navigation Link Active Color', 'unicon'),
                'subtitle' => __('Default: #1cbac8', 'unicon'),
                'default' => '#1cbac8',
                'transparent' => false,
                'validate' => 'color',
            ),

            array(
                'id'        => 'styling-subnavigation',
                'type'      => 'info',
                'desc'      => __('Subnavigation & Mobile Menu', 'unicon'),
            ),

            array(
                'id'=>'color_subnavbg',
                'type' => 'color',
                'title' => __('Subnavigation Background Color', 'unicon'),
                'subtitle' => __('Default: #666666', 'unicon'),
                'default' => '#262626',
                'transparent' => false,
                'validate' => 'color',
            ),

            array(
                'id'=>'font_subnav',
                'type' => 'typography', 
                'title' => __('Subnavigation Link', 'unicon'),
                'compiler'=>false,
                'google'=>true,
                'font-backup'=>false,
                'subsets'=>true,
                'font-size'=>true,
                'line-height'=>false,
                'word-spacing'=>false,
                'letter-spacing'=>false,
                'text-align'=>false,
                'color'=>true,
                'preview'=>false,
                //'output' => array('body'),
                'units'=>'px',
                'subtitle'=> __('Select your Subnavigation Font. <br />Default: 13px, #bbbbbb', 'unicon'),
                'default'=> array(
                    'color'=>"#bbbbbb",
                    'font-family'=>'Open Sans', 
                    'font-size'=>'13px',
                    'font-style'=>'400',
                    'font-weight'=>'400',
                )
            ),

            array(
                'id'=>'color_subnavlinkhover',
                'type' => 'color',
                'title' => __('Subnavigation Link Hover Color / Active Color', 'unicon'),
                'subtitle' => __('Default: #ffffff', 'unicon'),
                'default' => '#ffffff',
                'transparent' => false,
                'validate' => 'color',
            ),

            array(
                'id'=>'color_subnavborder',
                'type' => 'color',
                'title' => __('Subnavigation Border Color', 'unicon'),
                'subtitle' => __('Default: #333333', 'unicon'),
                'default' => '#333333',
                'transparent' => false,
                'validate' => 'color',
            ),

            array(
                'id'=>'color_megamenuheading',
                'type' => 'color',
                'title' => __('Mega Menu Heading Color', 'unicon'),
                'subtitle' => __('Default: #ffffff', 'unicon'),
                'default' => '#ffffff',
                'transparent' => false,
                'validate' => 'color',
            ),

            array(
                'id'=>'color_megamenuhover',
                'type' => 'color',
                'title' => __('Mega Menu Hover Background', 'unicon'),
                'subtitle' => __('Default: #333333', 'unicon'),
                'default' => '#333333',
                'transparent' => false,
                'validate' => 'color',
            ),

            array(
                'id'=>'color_mobilesearchbg',
                'type' => 'color',
                'title' => __('Mobile Menu Search Background Color', 'unicon'),
                'subtitle' => __('Default: #444444', 'unicon'),
                'default' => '#444444',
                'transparent' => false,
                'validate' => 'color',
            ),

            array(
                'id'=>'color_mobilesearch',
                'type' => 'color',
                'title' => __('Mobile Menu Search Color', 'unicon'),
                'subtitle' => __('Default: #cccccc', 'unicon'),
                'default' => '#cccccc',
                'transparent' => false,
                'validate' => 'color',
            ),

            array(
                'id'        => 'styling-body',
                'type'      => 'info',
                'desc'      => __('Body', 'unicon'),
            ),

            array(
                'id'=>'font_body',
                'type' => 'typography', 
                'title' => __('Body Font', 'unicon'),
                'compiler'=>false,
                'google'=>true,
                'font-backup'=>false,
                'subsets'=>true,
                'font-size'=>true,
                'line-height'=>false,
                'word-spacing'=>false,
                'letter-spacing'=>false,
                'text-align'=>false,
                'color'=>true,
                'preview'=>false,
                'all_styles'=>true,
                //'output' => array('body'),
                'units'=>'px',
                'subtitle'=> __('Default: 14px, #777777', 'unicon'),
                'default'=> array(
                    'color'=>"#777777",
                    'font-family'=>'Open Sans', 
                    'font-size'=>'13px',
                    'font-weight'=>'400',
                )
            ),

            array(
                'id'       => 'style_bodylineheight',
                'type'     => 'text',
                'title'    => __('Body Font Line Height', 'unicon'),
                'subtitle' => __('Default: 1.9 (Could also be 23px, or 0.3em)', 'unicon'),
                'default' => '1.9',
            ),

            array(
                'id'=>'color_bodybg',
                'type' => 'color',
                'title' => __('Body Backround Color', 'unicon'),
                'subtitle' => __('Default: #ffffff', 'unicon'),
                'default' => '#ffffff',
                'transparent' => false,
                'validate' => 'color',
            ),

            array(
                'id'        => 'styling-footer',
                'type'      => 'info',
                'desc'      => __('Footer', 'unicon'),
                'required' => array('switch_footerwidgets', "=", '1'),
            ),

            array(
                'id'=>'color_footerbg',
                'type' => 'color',
                'title' => __('Footer Background Color', 'unicon'),
                'subtitle' => __('Default: #262626', 'unicon'),
                'default' => '#262626',
                'transparent' => false,
                'validate' => 'color',
                'required' => array('switch_footerwidgets', "=", '1'),
            ),

            array( 
                'id'       => 'border_footertop',
                'type'     => 'border',
                'all'       => true,
                'title'    => __('Footer Border Top Color', 'unicon'),
                'subtitle' => __('Default: 4px none #1cbac8', 'unicon'),
                'default'  => array(
                    'border-color'  => '#1cbac8', 
                    'border-style'  => 'none', 
                    'border-top'    => '4px',
                ),
                'required' => array('switch_footerwidgets', "=", '1'),
            ),

            array(
                'id'=>'font_footerheadline',
                'type' => 'typography', 
                'title' => __('Footer Headline Font', 'unicon'),
                'compiler'=>false,
                'google'=>true,
                'font-backup'=>false,
                'subsets'=>true,
                'font-size'=>true,
                'line-height'=>false,
                'word-spacing'=>false,
                'letter-spacing'=>false,
                'text-align'=>false,
                'color'=>true,
                'preview'=>false,
                //'output' => array('body'),
                'units'=>'px',
                'subtitle'=> __('Default: 13px, #ffffff', 'unicon'),
                'default'=> array(
                    'color'=>"#ffffff",
                    'font-family'=>'Montserrat', 
                    'font-size'=>'13px',
                    'font-style'=>'700',
                    'font-weight'=>'700',
                ),
                'required' => array('switch_footerwidgets', "=", '1'),
            ),

            array(
                'id'=>'color_footertext',
                'type' => 'color',
                'title' => __('Footer Text Color', 'unicon'),
                'subtitle' => __('Default: #888888', 'unicon'),
                'default' => '#888888',
                'transparent' => false,
                'validate' => 'color',
                'required' => array('switch_footerwidgets', "=", '1'),
            ),

            array(
                'id'=>'color_footerlink',
                'type' => 'color',
                'title' => __('Footer Link Color', 'unicon'),
                'subtitle' => __('Default: #888888', 'unicon'),
                'default' => '#888888',
                'transparent' => false,
                'validate' => 'color',
                'required' => array('switch_footerwidgets', "=", '1'),
            ),

            array(
                'id'=>'color_footerlinkhover',
                'type' => 'color',
                'title' => __('Footer Link Hover Color', 'unicon'),
                'subtitle' => __('Default: #ffffff', 'unicon'),
                'default' => '#ffffff',
                'transparent' => false,
                'validate' => 'color',
                'required' => array('switch_footerwidgets', "=", '1'),
            ),

            array(
                'id'=>'style_footerwidgetborder',
                'type' => 'color',
                'title' => __('Footer Widget Border Color', 'unicon'),
                'subtitle' => __('Default: #333333', 'unicon'),
                'default' => '#333333',
                'transparent' => false,
                'validate' => 'color',
                'required' => array('switch_footerwidgets', "=", '1'),
            ),

            array(
                'id'        => 'styling-copyright',
                'type'      => 'info',
                'desc'      => __('Copyright', 'unicon'),
                'required' => array('switch_copyright', "=", '1'),
            ),

            array(
                'id'=>'color_copyrightbg',
                'type' => 'color',
                'title' => __('Copyright Backround Color', 'unicon'),
                'subtitle' => __('Default: #1b1b1b', 'unicon'),
                'default' => '#1b1b1b',
                'transparent' => false,
                'validate' => 'color',
                'required' => array('switch_copyright', "=", '1'),
            ),

            array(
                'id'=>'color_copyrighttext',
                'type' => 'color',
                'title' => __('Copyright Text Color', 'unicon'),
                'subtitle' => __('Default: #777777', 'unicon'),
                'default' => '#777777',
                'transparent' => false,
                'validate' => 'color',
                'required' => array('switch_copyright', "=", '1'),
            ),

            array(
                'id'=>'color_copyrightlink',
                'type' => 'color',
                'title' => __('Copyright Link Color', 'unicon'),
                'subtitle' => __('Default: #999999', 'unicon'),
                'default' => '#999999',
                'transparent' => false,
                'validate' => 'color',
                'required' => array('switch_copyright', "=", '1'),
            ),

            array(
                'id'=>'color_copyrightlinkhover',
                'type' => 'color',
                'title' => __('Copyright Link Hover', 'unicon'),
                'subtitle' => __('Default: #cccccc', 'unicon'),
                'default' => '#cccccc',
                'transparent' => false,
                'validate' => 'color',
                'required' => array('switch_copyright', "=", '1'),
            ),

            array(
                'id'        => 'styling-typography',
                'type'      => 'info',
                'desc'      => __('Typography', 'unicon'),
            ),

            array(
                'id'=>'font_headline',
                'type' => 'typography', 
                'title' => __('Headline Font', 'unicon'),
                'compiler'=>false,
                'google'=>true,
                'font-backup'=>false,
                'subsets'=>true,
                'font-size'=>false,
                'line-height'=>false,
                'word-spacing'=>false,
                'letter-spacing'=>false,
                'text-align'=>false,
                'color'=>true,
                'preview'=>false,
                'all_styles'=>true,
                //'output' => array('body'),
                'units'=>'px',
                'subtitle'=> __('Specify the H1 Headline font properties. Default: #333333', 'unicon'),
                'default'=> array(
                    'color'=>"#333333",
                    'font-family'=>'Open Sans', 
                    'font-style'=>'600',
                    'font-weight'=>'600',
                ),
            ),

            array(
                'id'       => 'size_h1',
                'type'     => 'text',
                'title'    => __('Headline H1 Font Size', 'unicon'),
                'subtitle' => __('Default: 28px', 'unicon'),
                'default' => '28px',
            ),

            array(
                'id'       => 'size_h2',
                'type'     => 'text',
                'title'    => __('Headline H2 Font Size', 'unicon'),
                'subtitle' => __('Default: 24px', 'unicon'),
                'default' => '24px',
            ),

            array(
                'id'       => 'size_h3',
                'type'     => 'text',
                'title'    => __('Headline H3 Font Size', 'unicon'),
                'subtitle' => __('Default: 20px', 'unicon'),
                'default' => '20px',
            ),

            array(
                'id'       => 'size_h4',
                'type'     => 'text',
                'title'    => __('Headline H4 Font Size', 'unicon'),
                'subtitle' => __('Default: 18px', 'unicon'),
                'default' => '16px',
            ),

            array(
                'id'       => 'size_h5',
                'type'     => 'text',
                'title'    => __('Headline H5 Font Size', 'unicon'),
                'subtitle' => __('Default: 16px', 'unicon'),
                'default' => '16px',
            ),

            array(
                'id'       => 'size_h6',
                'type'     => 'text',
                'title'    => __('Headline H6 Font Size', 'unicon'),
                'subtitle' => __('Default: 14px', 'unicon'),
                'default' => '16px',
            ),

            array(
                'id'        => 'styling-sidebar',
                'type'      => 'info',
                'desc'      => __('Sidebar', 'unicon'),
            ),

            array(
                'id'=>'font_sidebarheadline',
                'type' => 'typography', 
                'title' => __('Sidebar Headline Font', 'unicon'),
                'compiler'=>false,
                'google'=>true,
                'font-backup'=>false,
                'subsets'=>true,
                'font-size'=>true,
                'line-height'=>false,
                'word-spacing'=>false,
                'letter-spacing'=>false,
                'text-align'=>false,
                'color'=>true,
                'preview'=>false,
                //'output' => array('body'),
                'units'=>'px',
                'subtitle'=> __('Default: 13px, #444444', 'unicon'),
                'default'=> array(
                    'color'=>"#444444",
                    'font-size'=>'14px',
                    'font-family'=>'Montserrat', 
                    'font-style'=>'700',
                    'font-weight'=>'700',
                ),
            ),

            array(
                'id'=>'color_sidebarborder',
                'type' => 'color',
                'title' => __('Sidebar Border Color', 'unicon'),
                'subtitle' => __('Default: #efefef', 'unicon'),
                'default' => '#efefef',
                'transparent' => true,
                'validate' => 'color',
            ),

            array(
                'id'        => 'styling-customfont',
                'type'      => 'info',
                'desc'      => __('Special Font', 'unicon'),
            ),

            array(
                'id'=>'font_specialfont',
                'type' => 'typography', 
                'title' => __('Special Font', 'unicon'),
                'compiler'=>false,
                'google'=>true,
                'font-backup'=>false,
                'subsets'=>true,
                'font-size'=>false,
                'line-height'=>false,
                'word-spacing'=>false,
                'letter-spacing'=>true,
                'text-align'=>false,
                'color'=>false,
                'preview'=>false,
                'all_styles'=>true,
                //'output' => array('body'),
                'units'=>'px',
                'subtitle'=> __('This font is used for Buttons, parts in Shortcodes and Visual Elements.', 'unicon'),
                'default'=> array(
                    'color'=>"#444444",
                    'letter-spacing'=>'0',
                    'font-family'=>'Montserrat', 
                    'font-weight'=>'700',
                    'font-style'=>'700',
                ),
            ),


        ),
    ) );

    /* Header /--------------------------------------------------------- */
    Redux::setSection( $opt_name, array(
        'title'     => __('Header', 'unicon'),
        'icon'      => 'el-icon-file-edit',
        'fields'    => array(

            array(
                'id'        => 'header-layout',
                'type'      => 'info',
                'desc'      => __('Header Layout', 'unicon')
            ),

            array(
                'id'       => 'header_layout',
                'type'     => 'image_select',
                'title'    => __('Header Layout', 'unicon'), 
                'subtitle' => __('Select the header Layout', 'unicon'),
                'description' => __('<strong>PLEASE NOTE:</strong> Only Header 1 & 5 can be transparent. Keep that in mind when choosing your Page specific Headers.', 'unicon'),
                'options'  => array(
                    'v1'      => array(
                        'alt'   => 'Header 1', 
                        'img'   => get_template_directory_uri().'/framework/images/admin/header1.jpg'
                    ),
                    'v2'      => array(
                        'alt'   => 'Header 2', 
                        'img'   => get_template_directory_uri().'/framework/images/admin/header2.jpg'
                    ),
                    'v3'      => array(
                        'alt'   => 'Header 3', 
                        'img'   => get_template_directory_uri().'/framework/images/admin/header3.jpg'
                    ),
                    'v4'      => array(
                        'alt'   => 'Header 3', 
                        'img'   => get_template_directory_uri().'/framework/images/admin/header4.jpg'
                    ),
                    'v5'      => array(
                        'alt'   => 'Header 5', 
                        'img'   => get_template_directory_uri().'/framework/images/admin/header5.jpg'
                    ),
                ),
                'default' => 'v1'
            ),

            array(
                'id'       => 'select_topbarleft',
                'type'     => 'select',
                'title'    => __('Top Bar Left Content', 'unicon'), 
                'options'  => array(
                    'Text Field' => 'Text Field',
                    'Social Media' => 'Social Media',
                    'Navigation' => 'Navigation',
                    'Leave Empty' => 'Leave Empty',
                ),
                'default'  => 'Leave Empty',
                'required' => array( 
                    array('header_layout', "=", 'v2') 
                )
            ),

            array(
                'id'       => 'select_topbarright',
                'type'     => 'select',
                'title'    => __('Top Bar Right Content', 'unicon'), 
                'options'  => array(
                    'Text Field' => 'Text Field',
                    'Social Media' => 'Social Media',
                    'Navigation' => 'Navigation',
                    'Leave Empty' => 'Leave Empty',
                ),
                'default'  => 'Leave Empty',
                'required' => array( 
                    array('header_layout', "=", 'v2') 
                )
            ),

            array(
                'id'=>'textarea_topbar',
                'type' => 'textarea',
                'title' => __('Topbar Textfield', 'unicon'), 
                'subtitle' => __('Enter your Text for the Topbar (HTML allowed).', 'unicon'),
                'default' => '',
                'required' => array( 
                    array('header_layout', "=", 'v2') 
                )
            ),

            array(
                'id'       => 'switch_topbarresponsive',
                'type'     => 'switch', 
                'title'    => __('Hide Topbar on Mobiles?', 'unicon'),
                'subtitle'  => __('Enable / Disable to hide Topbar on Mobile Devices.', 'unicon'),
                'default'  => false,
                'required' => array( 
                    array('header_layout', "=", 'v2') 
                )
            ),

            array(
                'id'=>'textarea_slogan',
                'type' => 'textarea',
                'title' => __('Slogan', 'unicon'), 
                'subtitle' => __('Enter your Text for the Slogan (HTML allowed).', 'unicon'),
                'default' => 'For the next generation of big businesses.',
                'required' => array( 
                    array('header_layout', "=", 'v3') 
                )
            ),

            array(
                'id'       => 'switch_stickyheader',
                'type'     => 'switch', 
                'title'    => __('Sticky Header', 'unicon'),
                'subtitle'  => __('Enable / Disable Sticky Header.', 'unicon'),
                'default'  => true,
            ),
            
            array(
                'id'       => 'switch_searchform',
                'type'     => 'switch', 
                'title'    => __('Search in Header', 'unicon'),
                'subtitle' => __('Enable / Disable Search in Header', 'unicon'),
                'default'  => true,
                'required' => array( 
                    array('header_layout', "!=", 'v3'),
                    array('header_layout', "!=", 'v4')
                )
            ),

            array(
                'id'       => 'switch_searchformmobile',
                'type'     => 'switch', 
                'title'    => __('Searchform in Mobile Navigation', 'unicon'),
                'subtitle' => __('Enable / Disable Searchform in Mobile Navigation', 'unicon'),
                'default'  => true,
            ),

            array(
                'id'       => 'switch_pagescroll',
                'type'     => 'switch', 
                'title'    => __('Enable OnePage Navigation?', 'unicon'),
                'subtitle'  => __('Enable / Disable One Page Navigation. Read the Documentation on how to set everything up correctly.', 'unicon'),
                'default'  => false,
            ),

            array(
                'id'        => 'layout-logo',
                'type'      => 'info',
                'desc'      => __('Logo', 'unicon')
            ),

            array(
                'id'       => 'media_logo',
                'type'     => 'media', 
                'url'      => false,
                'title'    => __('Logo Upload', 'unicon'),
            ),

            array(
                'id'       => 'media_logo_retina',
                'type'     => 'media', 
                'url'      => false,
                'title'    => __('Retina Logo Upload', 'unicon'),
                'subtitle' => __('Upload your Retina Logo. This should be your Logo in double size (If your logo is 100 x 20px, it should be 200 x 40px)', 'unicon'),
            ),

            array(
                'id'        => 'layout-logo',
                'type'      => 'info',
                'desc'      => __('Logo for Transparent Background', 'unicon')
            ),

            array(
                'id'       => 'media_logo_transparent',
                'type'     => 'media', 
                'url'      => false,
                'title'    => __('Transparent Logo Upload', 'unicon'),
                'subtitle' => __('Upload your logo here for the Transparent Header (usually a white version of your logo).', 'unicon'),
            ),

            array(
                'id'       => 'media_logo_retina_transparent',
                'type'     => 'media', 
                'url'      => false,
                'title'    => __('Transparent Retina Logo Upload', 'unicon'),
                'subtitle' => __('Upload your Retina Logo for the Transparent Header. This should be your Logo in double size (If your logo is 100 x 20px, it should be 200 x 40px)', 'unicon'),
            ),

            array(
                'id'        => 'layout-headersettings',
                'type'      => 'info',
                'desc'      => __('Header-V1, Header-V2, Header-V5 & Mobile Header Settings', 'unicon')
            ),

            array(
                'id'       => 'style_headerheight',
                'type'     => 'text',
                'title'    => __('Header Height', 'unicon'),
                'subtitle' => __('Enter Header Height. Default: 90px', 'unicon'),
                'default' => '90px',
            ),

            array(
                'id'       => 'style_logotopmargin',
                'type'     => 'text',
                'title'    => __('Logo Top Margin', 'unicon'),
                'subtitle' => __('Enter your Top margin value for the Logo in pixels (Default: 34px)', 'unicon'),
                'default' => '34px',
            ),

            array(
                'id'       => 'style_navmargintop',
                'type'     => 'text',
                'title'    => __('Navigation Top Margin', 'unicon'),
                'subtitle' => __('Default: 35px', 'unicon'),
                'default' => '35px',
            ),

            array(
                'id'        => 'layout-headerv3settings',
                'type'      => 'info',
                'desc'      => __('Header-V3 & Header-V4 Settings', 'unicon'),
                'required' => array( 
                    array('header_layout', "!=", 'v1'),
                    array('header_layout', "!=", 'v2'),
                    array('header_layout', "!=", 'v5')  
                )
            ),

            array(
                'id'       => 'style_hv3_topmargin',
                'type'     => 'text',
                'title'    => __('Logo Top Margin', 'unicon'),
                'subtitle' => __('Enter Logo Top Margin. Default: 30px', 'unicon'),
                'default' => '30px',
                'required' => array( 
                    array('header_layout', "!=", 'v1'),
                    array('header_layout', "!=", 'v2'),
                    array('header_layout', "!=", 'v5')  
                )
            ),

            array(
                'id'       => 'style_hv3_bottommargin',
                'type'     => 'text',
                'title'    => __('Logo Bottom Margin', 'unicon'),
                'subtitle' => __('Enter Logo Bottom Margin. Default: 30px', 'unicon'),
                'default' => '30px',
                'required' => array( 
                    array('header_layout', "!=", 'v1'),
                    array('header_layout', "!=", 'v2'),
                    array('header_layout', "!=", 'v5')  
                )
            ),

            array(
                'id'       => 'style_hv3slogan_topmargin',
                'type'     => 'text',
                'title'    => __('Slogan Top Margin', 'unicon'),
                'subtitle' => __('Enter Slogan Top Margin. Default: 30px', 'unicon'),
                'default' => '26px',
                'required' => array( 
                    array('header_layout', "=", 'v3') 
                )
            ),

            array(
                'id'        => 'layout-mobileheader',
                'type'      => 'info',
                'desc'      => __('Mobile Header Breakpoint', 'unicon')
            ),

            array(
                'id'       => 'style_mobileheaderbp',
                'type'     => 'text',
                'title'    => __('Mobile Header Breakpoint', 'unicon'),
                'subtitle' => __('Theme Breakpoints are: 1199px, 959px, 767px. Default: 959px', 'unicon'),
                'default' => '959px',
            ),

        ),
    ) );

    /* Social Media /--------------------------------------------------------- */
    Redux::setSection( $opt_name, array(
        'title'     => __('Social Media', 'unicon'),
        'icon'      => 'el-icon-twitter',
        'fields'    => array(

            array(
                'id'        => 'social-media',
                'type'      => 'info',
                'desc'      => __('Social Media Icons (Remember to include the "http://" in all URLs)', 'unicon')
            ),

            array(
                'id'       => 'social_dribbble',
                'type'     => 'text',
                'title'    => __('Dribbble', 'unicon'),
                'subtitle' => __('Enter URL to your Dribbble Account', 'unicon'),
                'default'  => '',
            ),

            array(
                'id'       => 'social_facebook',
                'type'     => 'text',
                'title'    => __('Facebook', 'unicon'),
                'subtitle' => __('Enter URL to your Facebook Account', 'unicon'),
                'default'  => '',
            ),

            array(
                'id'       => 'social_foursquare',
                'type'     => 'text',
                'title'    => __('Foursquare', 'unicon'),
                'subtitle' => __('Enter URL to your Foursquare Account', 'unicon'),
                'default'  => '',
            ),

            array(
                'id'       => 'social_flickr',
                'type'     => 'text',
                'title'    => __('Flickr', 'unicon'),
                'subtitle' => __('Enter URL to your Flickr Account', 'unicon'),
                'default'  => '',
            ),

            array(
                'id'       => 'social_github',
                'type'     => 'text',
                'title'    => __('Github', 'unicon'),
                'subtitle' => __('Enter URL to your Github Account', 'unicon'),
                'default'  => '',
            ),

            array(
                'id'       => 'social_googleplus',
                'type'     => 'text',
                'title'    => __('Google+', 'unicon'),
                'subtitle' => __('Enter URL to your Google+ Account', 'unicon'),
                'default'  => '',
            ),

            array(
                'id'       => 'social_instagram',
                'type'     => 'text',
                'title'    => __('Instagram', 'unicon'),
                'subtitle' => __('Enter URL to your Instagram Account', 'unicon'),
                'default'  => '',
            ),

            array(
                'id'       => 'social_linkedin',
                'type'     => 'text',
                'title'    => __('LinkedIn', 'unicon'),
                'subtitle' => __('Enter URL to your LinkedIn Account', 'unicon'),
                'default'  => '',
            ),

            array(
                'id'       => 'social_pinterest',
                'type'     => 'text',
                'title'    => __('Pinterest', 'unicon'),
                'subtitle' => __('Enter URL to your Pinterest Account', 'unicon'),
                'default'  => '',
            ),

            array(
                'id'       => 'social_renren',
                'type'     => 'text',
                'title'    => __('Renren', 'unicon'),
                'subtitle' => __('Enter URL to your Renren Account', 'unicon'),
                'default'  => '',
            ),

            array(
                'id'       => 'social_rss',
                'type'     => 'text',
                'title'    => __('RSS', 'unicon'),
                'subtitle' => __('Enter URL to your RSS Account', 'unicon'),
                'default'  => '',
            ),

            array(
                'id'       => 'social_skype',
                'type'     => 'text',
                'title'    => __('Skype', 'unicon'),
                'subtitle' => __('Enter URL to your Skype Account', 'unicon'),
                'default'  => '',
            ),

            array(
                'id'       => 'social_soundcloud',
                'type'     => 'text',
                'title'    => __('Soundcloud', 'unicon'),
                'subtitle' => __('Enter URL to your Soundcloud Account', 'unicon'),
                'default'  => '',
            ),

            array(
                'id'       => 'social_stackoverflow',
                'type'     => 'text',
                'title'    => __('Stack Overflow', 'unicon'),
                'subtitle' => __('Enter URL to your Stack Overflow Account', 'unicon'),
                'default'  => '',
            ),

            array(
                'id'       => 'social_twitter',
                'type'     => 'text',
                'title'    => __('Twitter', 'unicon'),
                'subtitle' => __('Enter URL to your Twitter Account', 'unicon'),
                'default'  => '',
            ),

            array(
                'id'       => 'social_tumblr',
                'type'     => 'text',
                'title'    => __('Tumblr', 'unicon'),
                'subtitle' => __('Enter URL to your Tumblr Account', 'unicon'),
                'default'  => '',
            ),

            array(
                'id'       => 'social_vimeo',
                'type'     => 'text',
                'title'    => __('Vimeo', 'unicon'),
                'subtitle' => __('Enter URL to your Vimeo Account', 'unicon'),
                'default'  => '',
            ),

            array(
                'id'       => 'social_vk',
                'type'     => 'text',
                'title'    => __('VK', 'unicon'),
                'subtitle' => __('Enter URL to your VK Account', 'unicon'),
                'default'  => '',
            ),

            array(
                'id'       => 'social_weibo',
                'type'     => 'text',
                'title'    => __('Weibo', 'unicon'),
                'subtitle' => __('Enter URL to your Weibo Account', 'unicon'),
                'default'  => '',
            ),

            array(
                'id'       => 'social_xing',
                'type'     => 'text',
                'title'    => __('Xing', 'unicon'),
                'subtitle' => __('Enter URL to your Xing Account', 'unicon'),
                'default'  => '',
            ),

            array(
                'id'       => 'social_youtube',
                'type'     => 'text',
                'title'    => __('YouTube', 'unicon'),
                'subtitle' => __('Enter URL to your YouTube Account', 'unicon'),
                'default'  => '',
            ),

            array(
                'id'        => 'own-social-media-1',
                'type'      => 'info',
                'desc'      => __('Own Social Media Icon #1 (Remember to include the "http://" in all URLs)', 'unicon')
            ),

            array(
                'id'       => 'ownsocial1_name',
                'type'     => 'text',
                'title'    => __('Social Field #1 - Name', 'unicon'),
                'subtitle' => __('Social Field Name', 'unicon'),
                'default'  => '',
            ),
            array(
                'id'       => 'ownsocial1_icon',
                'type'     => 'text',
                'title'    => __('Social Field #1 - Icon', 'unicon'),
                'subtitle' => __('Use any <a href="http://fontawesome.io/icons/" target="_blank">FontAwesome</a> Icon here. For example: fa-apple', 'unicon'),
                'default'  => '',
            ),
            array(
                'id'       => 'ownsocial1_url',
                'type'     => 'text',
                'title'    => __('Social Field #1 - URL', 'unicon'),
                'subtitle' => __('Enter URL to your Social Media Account here', 'unicon'),
                'default'  => '',
            ),

            array(
                'id'        => 'own-social-media-2',
                'type'      => 'info',
                'desc'      => __('Own Social Media Icon #2 (Remember to include the "http://" in all URLs)', 'unicon')
            ),

            array(
                'id'       => 'ownsocial2_name',
                'type'     => 'text',
                'title'    => __('Social Field #2 - Name', 'unicon'),
                'subtitle' => __('Social Field Name', 'unicon'),
                'default'  => '',
            ),
            array(
                'id'       => 'ownsocial2_icon',
                'type'     => 'text',
                'title'    => __('Social Field #2 - Icon', 'unicon'),
                'subtitle' => __('Use any <a href="http://fontawesome.io/icons/" target="_blank">FontAwesome</a> Icon here. For example: fa-apple', 'unicon'),
                'default'  => '',
            ),
            array(
                'id'       => 'ownsocial2_url',
                'type'     => 'text',
                'title'    => __('Social Field #2 - URL', 'unicon'),
                'subtitle' => __('Enter URL to your Social Media Account here', 'unicon'),
                'default'  => '',
            ),

        ),
    ) );

    /* Footer /--------------------------------------------------------- */
    Redux::setSection( $opt_name, array(
        'title'     => __('Footer', 'unicon'),
        'icon'      => 'el-icon-file-edit',
        'fields'    => array(

            array(
                'id'        => 'footer-footer',
                'type'      => 'info',
                'desc'      => __('Footer Widgets', 'unicon')
            ),

            array(
                'id'       => 'switch_footerwidgets',
                'type'     => 'switch', 
                'title'    => __('Footer Widget Area', 'unicon'),
                'subtitle' => __('Enable / Disable widgetized Footer Area.', 'unicon'),
                'default'  => true,
            ),

            array(
                'id'       => 'select_footercolumns',
                'type'     => 'image_select',
                'title'    => __('Footer Widget Columns', 'unicon'), 
                'subtitle' => __('Select Footer Columns', 'unicon'),
                'options'  => array(
                    '1'      => array(
                        'alt'   => 'Header 1', 
                        'img'   => get_template_directory_uri().'/framework/images/admin/col-1.jpg'
                    ),
                    '2'      => array(
                        'alt'   => 'Header 2', 
                        'img'   => get_template_directory_uri().'/framework/images/admin/col-2.jpg'
                    ),
                    '3'      => array(
                        'alt'   => 'header 3', 
                        'img'  => get_template_directory_uri().'/framework/images/admin/col-3.jpg'
                    ),
                    '4'      => array(
                        'alt'   => 'Header 4', 
                        'img'   => get_template_directory_uri().'/framework/images/admin/col-4.jpg'
                    )
                ),
                'default' => '4',
                'required' => array('switch_footerwidgets', "=", '1'),
            ),

            array(
                'id'        => 'footer-copyright',
                'type'      => 'info',
                'desc'      => __('Copyright', 'unicon')
            ),

            array(
                'id'       => 'switch_copyright',
                'type'     => 'switch', 
                'title'    => __('Copyright Area', 'unicon'),
                'subtitle' => __('Enable / Disable Copyright Area.', 'unicon'),
                'default'  => true,
            ),

            array(
                'id'=>'textarea_copyright',
                'type' => 'textarea',
                'title' => __('Copyright Text', 'unicon'), 
                'subtitle' => __('Enter your Copyright Text (HTML allowed).', 'unicon'),
                'default' => '2019 Theme - WordPress Theme built by <a href="http://www.mintithemes.com" rel="nofollow">Mintithemes</a> using <a href="http://wordpress.org/" target="_blank">WordPress</a>.',
                'required' => array('switch_copyright', "=", '1'),
            ),

            array(
                'id'       => 'select_copyright',
                'type'     => 'select',
                'title'    => __('Copyright Right Content', 'unicon'), 
                'options'  => array(
                    'Social Media' => 'Social Media',
                    'Navigation' => 'Navigation',
                    'Leave Empty' => 'Leave Empty',
                ),
                'default'  => 'Social Media',
                'required' => array('switch_copyright', "=", '1'),
            ),

        ),
    ) );

    /* Titlebar /--------------------------------------------------------- */
    Redux::setSection( $opt_name, array(
        'title'     => __('Titlebar', 'unicon'),
        'icon'      => 'el-icon-text-width',
        'fields'    => array(

            array(
                'id'        => 'titlebar-default',
                'type'      => 'info',
                'desc'      => __('Default Titlebar Settings', 'unicon')
            ),

            array(
                'id'       => 'titlebar_layout',
                'type'     => 'select',
                'title'    => __('Default Global Titlebar Layout', 'unicon'), 
                'subtitle' => __('Define the default Titlebar for your Page. This will be shown on all pages and can be overwritten individually by each page.', 'unicon'),
                'options'  => array(
                    'title'                 => 'Header + Title',
                    'featuredimagecenter'   => 'Header + Image Title',
                    'transparentimage'      => 'Transparent Header + Image Title',
                    'notitle'               => 'Header only'
                ),
                'default'  => 'title',
            ),

            array(
                'id'       => 'titlebar_image',
                'type'     => 'media', 
                'url'      => false,
                'title'    => __('Titlebar Image', 'unicon'),
                'subtitle' => __('Upload your Titlebar Image', 'unicon'),
                'required' => array( 
                    array('titlebar_layout', "!=", 'title'), 
                    array('titlebar_layout','!=','notitle')  
                )
            ),

            array(
                'id'       => 'titlebar_color',
                'type'     => 'select', 
                'url'      => false,
                'title'    => __('Transparent Header Color', 'unicon'),
                'subtitle' => __('Select the default Header color for Transparent Headers', 'unicon'),
                'options'  => array(
                    'light' => 'Light (for dark backgrounds)',
                    'dark'  => 'Dark (for light backgrounds)',
                ),
                'required' => array( 
                    array('titlebar_layout', "=", 'transparentimage'), 
                ),
                'default'  => 'light',
            ),

            array(
                'id'       => 'titlebar_breadcrumbs',
                'type'     => 'switch', 
                'title'    => __('Breadcrumbs', 'unicon'),
                'subtitle' => __('Enable / Disable Breadcrumbs.', 'unicon'),
                'default'  => true,
            ),

            array(
                'id'        => 'titlebar-text',
                'type'      => 'info',
                'desc'      => __('Titlebar Text', 'unicon')
            ),

            array(
                'id'       => 'text_titlebar_blog',
                'type'     => 'text',
                'title'    => __('Blog Title', 'unicon'),
                'subtitle' => __('Text of the Titlebar for the Blog Detail Page.', 'unicon'),
                'default' => 'Blog',
            ),

            array(
                'id'       => 'text_titlebar_woocommerce',
                'type'     => 'text',
                'title'    => __('WooCommerce Title', 'unicon'),
                'subtitle' => __('Text of the Titlebar for the Shop Overview & Product Detail Page.', 'unicon'),
                'default' => 'Shop',
            ),

            array(
                'id'       => 'text_titlebar_forums',
                'type'     => 'text',
                'title'    => __('bbPress Title', 'unicon'),
                'subtitle' => __('Text of the bbPress Breadcrumbs.', 'unicon'),
                'default' => 'Forum',
            ),

            /* Titlebar Style: Title /----------------------------------------------------- */
            array(
                'id'        => 'titlebar-style',
                'type'      => 'info',
                'desc'      => __('Titlebar Style: Title', 'unicon')
            ),

            array(
                'id'=>'color_titlebarbg',
                'type' => 'color',
                'title' => __('Titlebar Backround Color', 'unicon'),
                'subtitle' => __('Default: #f9f9f9', 'unicon'),
                'default' => '#f9f9f9',
                'transparent' => false,
                'validate' => 'color',
            ),

            array( 
                'id'       => 'border_titlebar',
                'type'     => 'border',
                'all'       => true,
                'title'    => __('Titlebar Border Bottom Color', 'unicon'),
                'subtitle' => __('Default: 1px solid #efefef', 'unicon'),
                'default'  => array(
                    'border-color'  => '#efefef', 
                    'border-style'  => 'solid', 
                    'border-bottom'    => '1px',
                ),
            ),

            array(
                'id'=>'font_titlebar',
                'type' => 'typography', 
                'title' => __('Titlebar Title Text', 'unicon'),
                'compiler'=>false,
                'google'=>true,
                'font-backup'=>false,
                'subsets'=>true,
                'font-size'=>true,
                'line-height'=>false,
                'word-spacing'=>false,
                'letter-spacing'=>false,
                'text-align'=>false,
                'color'=>true,
                'preview'=>false,
                //'output' => array('body'),
                'units'=>'px',
                'subtitle'=> __('Default: 18px, #777777', 'unicon'),
                'default'=> array(
                    'color'=>"#777777",
                    'font-family'=>'Open Sans', 
                    'font-size'=>'22px',
                    'font-style'=>'400',
                    'font-weight'=>'400',
                )
            ),

            array(
                'id'=>'font_breadcrumb',
                'type' => 'typography', 
                'title' => __('Breadcrumb Text', 'unicon'),
                'compiler'=>false,
                'google'=>true,
                'font-backup'=>false,
                'subsets'=>true,
                'font-size'=>true,
                'line-height'=>false,
                'word-spacing'=>false,
                'letter-spacing'=>false,
                'text-align'=>false,
                'color'=>true,
                'preview'=>false,
                //'output' => array('body'),
                'units'=>'px',
                'subtitle'=> __('Default: 13px, #aaaaaa', 'unicon'),
                'default'=> array(
                    'color'=>"#aaaaaa",
                    'font-family'=>'Open Sans', 
                    'font-size'=>'13px',
                    'font-style'=>'400',
                    'font-weight'=>'400',
                )
            ),

            array(
                'id'=>'color_breadcrumbhover',
                'type' => 'color',
                'title' => __('Breadcrumb Hover Color', 'unicon'),
                'subtitle' => __('Default: #666666', 'unicon'),
                'default' => '#666666',
                'transparent' => false,
                'validate' => 'color',
            ),

            array(
                'id'       => 'style_breadcrumbmargin',
                'type'     => 'text',
                'title'    => __('Breadcrumb Margin Top', 'unicon'),
                'subtitle' => __('Default: 6px', 'unicon'),
                'default' => '6px',
            ),

            /* Titlebar Style: Image Title /----------------------------------------------------- */
            array(
                'id'        => 'titlebar-style',
                'type'      => 'info',
                'desc'      => __('Titlebar Style: Image Title', 'unicon')
            ),

            array(
                'id'=>'font_titlebar_3',
                'type' => 'typography', 
                'title' => __('Titlebar Title Text', 'unicon'),
                'compiler'=>false,
                'google'=>true,
                'font-backup'=>false,
                'subsets'=>true,
                'font-size'=>true,
                'line-height'=>false,
                'word-spacing'=>false,
                'letter-spacing'=>true,
                'text-align'=>false,
                'text-transform' => true,
                'color'=>true,
                'preview'=>false,
                //'output' => array('body'),
                'units'=>'px',
                'subtitle'=> __('Default: 42px, #ffffff', 'unicon'),
                'default'=> array(
                    'color'=>"#ffffff",
                    'font-family'=>'Montserrat', 
                    'font-size'=>'42px',
                    'font-style'=>'700',
                    'font-weight'=>'700',
                    'letter-spacing'=> '1',
                    'text-transform'=>'uppercase',
                )
            ),

            array(
                'id'       => 'align_titlebar_3',
                'type'     => 'select',
                'title'    => __('Text Align', 'unicon'), 
                'subtitle' => __('Choose the align of your Text', 'unicon'),
                'options'  => array(
                    'center' => 'Center',
                    'left'  => 'Left',
                    'right' => 'Right',
                ),
                'default'  => 'center',
            ),

        ),
    ) );

    /* Blog /--------------------------------------------------------- */
    Redux::setSection( $opt_name, array(
        'title'     => __('Blog', 'unicon'),
        'icon'      => 'el-icon-pencil',
        'fields'    => array(

            array(
                'id'        => 'blog-general',
                'type'      => 'info',
                'desc'      => __('Blog General', 'unicon')
            ),

            array(
                'id'       => 'switch_readmore',
                'type'     => 'switch', 
                'title'    => __('Read More Button in Blog Posts', 'unicon'),
                'subtitle' => __('Enable / Disable Read More Button on Blog Posts.', 'unicon'),
                'default'  => true,
            ),

            array(
                'id'       => 'switch_metadata',
                'type'     => 'switch', 
                'title'    => __('Metadata on Blog Posts', 'unicon'),
                'subtitle' => __('Enable / Disable Metadata on Blog Posts.', 'unicon'),
                'default'  => true,
            ),

            array(
                'id'        => 'check_metadata',
                'type'      => 'checkbox',
                'title'     => __('Metadata Options', 'unicon'),
                'subtitle'  => __('Check the Metadata you want to show on Blog Posts.', 'unicon'),
                'options'   => array(
                    'date' => 'Date', 
                    'author' => 'Author', 
                    'comments' => 'Comments', 
                    'categories' => 'Categories',
                    'tags' => 'Tags (only on Blog Post Details)',
                ),
                'default'   => array(
                    'date' => '1', 
                    'author' => '1', 
                    'comments' => '1',
                    'categories' => '1',
                    'tags' => '0',
                ),
                'required' => array('switch_metadata', "=", '1'),
            ),

            array(
                'id'        => 'blog-detail',
                'type'      => 'info',
                'desc'      => __('Blog Post Detail Page', 'unicon')
            ),

            array(
                'id'       => 'select_bloglayout',
                'type'     => 'image_select',
                'title'    => __('Blog Detail Layout', 'unicon'), 
                'subtitle' => __('Select the Sidebar Position for Blog Detail Pages.', 'unicon'),
                'options'  => array(
                    'sidebar-left'      => array(
                        'alt'   => 'Sidebar Left', 
                        'img'   => get_template_directory_uri().'/framework/images/admin/layout-1.jpg'
                    ),
                    'sidebar-right'      => array(
                        'alt'   => 'Sidebar Right', 
                        'img'   => get_template_directory_uri().'/framework/images/admin/layout-2.jpg'
                    ),
                    'no-sidebar'      => array(
                        'alt'   => 'No Sidebar', 
                        'img'  => get_template_directory_uri().'/framework/images/admin/layout-3.jpg'
                    ),
                ),
                'default' => 'sidebar-right',
            ),

            array(
                'id'       => 'switch_blogpagination',
                'type'     => 'switch', 
                'title'    => __('Previous / Next Pagination', 'unicon'),
                'subtitle' => __('Enable / Disable Pagination on Blog Posts.', 'unicon'),
                'default'  => true,
            ),

            array(
                'id'       => 'switch_sharebox',
                'type'     => 'switch', 
                'title'    => __('ShareBox in Blog Details', 'unicon'),
                'subtitle' => __('Enable / Disable Share-Box on Blog Posts.', 'unicon'),
                'default'  => true,
            ),

            array(
                'id'        => 'check_sharebox',
                'type'      => 'checkbox',
                'title'     => __('Sharebox Social Icons', 'unicon'),
                'subtitle'  => __('Check the Social Icons you want to show.', 'unicon'),
                'options'   => array(
                    'facebook' => 'Facebook', 
                    'twitter' => 'Twitter', 
                    'linkedin' => 'LinkedIn',
                    'tumblr' => 'Reddit',
                    'pinterest' => 'Pinterest',
                    'googleplus' => 'Google Plus',
                    'email' => 'E-Mail',
                ),
                'default'   => array(
                    'facebook' => '1', 
                    'twitter' => '1', 
                    'linkedin' => '1',
                    'tumblr' => '1',
                    'pinterest' => '1',
                    'googleplus' => '1',
                    'email' => '1',
                ),
                'required' => array('switch_sharebox', "=", '1'),
            ),

            array(
                'id'       => 'switch_authorinfo',
                'type'     => 'switch', 
                'title'    => __('Author Info in Blog Details', 'unicon'),
                'subtitle' => __('Enable / Disable Author Info on Blog Posts. You can add an Author text in your User Settings.', 'unicon'),
                'default'  => true,
            ),

            array(
                'id'       => 'switch_relatedposts',
                'type'     => 'switch', 
                'title'    => __('Related Posts in Blog Details', 'unicon'),
                'subtitle' => __('Enable / Disable Related Posts on Blog Posts.', 'unicon'),
                'default'  => true,
            ),

        ),
    ) );

    /* Portfolio /--------------------------------------------------------- */
    Redux::setSection( $opt_name, array(
        'title'     => __('Portfolio', 'unicon'),
        'icon'      => 'el-icon-briefcase',
        'fields'    => array(

            array(
                'id'        => 'portfolio-general',
                'type'      => 'info',
                'desc'      => __('Portfolio', 'unicon')
            ),

            array(
                'id'       => 'text_portfolioslug',
                'type'     => 'text',
                'title'    => __('Portfolio Slug', 'unicon'),
                'description' => __('Enter the URL Slug for your Portfolio (Default: portfolio-item) <br /><strong>Go to Settings > Permalinks and save your permalinks after changing this.</strong>', 'unicon'),
                'default'  => 'portfolio-item'
            ),

            array(
                'id'        => 'portfolio-detail',
                'type'      => 'info',
                'desc'      => __('Portfolio Detail Page', 'unicon')
            ),

            array(
                'id'       => 'switch_portfoliopagination',
                'type'     => 'switch', 
                'title'    => __('Previous / Next Pagination', 'unicon'),
                'subtitle' => __('Enable / Disable Pagination on Portfolio Posts.', 'unicon'),
                'default'  => false,
            ),

        ),
    ) );
    
    // check if woocommerce plugin installed
    if ( class_exists('Woocommerce') ) {

    /* WooCommerce /--------------------------------------------------------- */
    Redux::setSection( $opt_name, array(
        'title'     => __('WooCommerce', 'unicon'),
        'icon'      => 'el-icon-shopping-cart',
        'fields'    => array(

            array(
                'id'        => 'woocommerce-general-2',
                'type'      => 'info',
                'desc'      => __('WooCommerce General', 'unicon')
            ),

            array(
                'id'       => 'switch_shoppingicon',
                'type'     => 'switch', 
                'title'    => __('Shopping Cart Icon in Header', 'unicon'),
                'subtitle' => __('Enable / Disable Shopping Cart Icon in Header', 'unicon'),
                'default'  => true,
            ),

            array(
                'id'       => 'select_woocommercesidebar',
                'type'     => 'image_select',
                'title'    => __('Main Shop Layout', 'unicon'), 
                'subtitle' => __('Select the Sidebar Position of the main shop layout.', 'unicon'),
                'options'  => array(
                    'no-sidebar'      => array(
                        'alt'   => 'No Sidebar', 
                        'img'  => get_template_directory_uri().'/framework/images/admin/layout-3.jpg'
                    ),
                    'sidebar-left'      => array(
                        'alt'   => 'Sidebar Left', 
                        'img'   => get_template_directory_uri().'/framework/images/admin/layout-1.jpg'
                    ),
                    'sidebar-right'      => array(
                        'alt'   => 'Sidebar Right', 
                        'img'   => get_template_directory_uri().'/framework/images/admin/layout-2.jpg'
                    ),
                ),
                'default'  => 'sidebar-left',
            ),

            array(
                'id'       => 'select_woocommercesidebar_single',
                'type'     => 'image_select',
                'title'    => __('Single Product Layout', 'unicon'), 
                'subtitle' => __('Select the Sidebar Position of the single product page.', 'unicon'),
                'options'  => array(
                    'no-sidebar'      => array(
                        'alt'   => 'No Sidebar', 
                        'img'  => get_template_directory_uri().'/framework/images/admin/layout-3.jpg'
                    ),
                    'sidebar-left'      => array(
                        'alt'   => 'Sidebar Left', 
                        'img'   => get_template_directory_uri().'/framework/images/admin/layout-1.jpg'
                    ),
                    'sidebar-right'      => array(
                        'alt'   => 'Sidebar Right', 
                        'img'   => get_template_directory_uri().'/framework/images/admin/layout-2.jpg'
                    ),
                ),
                'default'  => 'no-sidebar',
            ),

            array(
                'id'        => 'woocommerce-general',
                'type'      => 'info',
                'desc'      => __('WooCommerce Overview Pages', 'unicon')
            ),

            array(
                'id'       => 'select_woocommercecolumns',
                'type'     => 'select',
                'title'    => __('WooCommerce Columns', 'unicon'), 
                'subtitle' => __('WooCommerce Columns', 'unicon'),
                'options'  => array(
                    'columns-2'   => '2 Columns',
                    'columns-3'   => '3 Columns',
                    'columns-4'   => '4 Columns',
                ),
                'default'  => 'columns-3',
            ),

            array(
                'id'       => 'text_shopitems',
                'type'     => 'text',
                'title'    => __('Items per Shop Page', 'unicon'),
                'description' => __('Enter how many items you want to show on Shop pages & Categorie Pages before Pagination shows up (Default: 12)', 'unicon'),
                'default'  => '12'
            ),

            array(
                'id'       => 'switch_secondimageonhover',
                'type'     => 'switch', 
                'title'    => __('Secondary Image on Hover', 'unicon'),
                'subtitle' => __('Enable / Disable to add secondary Image on hover of Product Images.', 'unicon'),
                'default'  => true,
            ),

            array(
                'id'       => 'switch_shopsorting',
                'type'     => 'switch', 
                'title'    => __('Shop Sort', 'unicon'),
                'subtitle' => __('Enable / Disable sort-by function on Shop Pages', 'unicon'),
                'default'  => true,
            ),

            array(
                'id'       => 'switch_shopresultcount',
                'type'     => 'switch', 
                'title'    => __('Shop Result Count', 'unicon'),
                'subtitle' => __('Enable / Disable Result Count on Shop Pages', 'unicon'),
                'default'  => true,
            ),

            array(
                'id'       => 'switch_addtocart',
                'type'     => 'switch', 
                'title'    => __('Add to Cart Button', 'unicon'),
                'subtitle' => __('Enable / Disable "Add to Cart"-Button on Shop Pages', 'unicon'),
                'default'  => false,
            ),

            array(
                'id'       => 'switch_cartcrosssells',
                'type'     => 'switch', 
                'title'    => __('Cart Cross-Sells', 'unicon'),
                'subtitle' => __('Enable / Disable Cross Sell Products in Cart', 'unicon'),
                'default'  => false,
            ),

            array(
                'id'        => 'woocommerce-general',
                'type'      => 'info',
                'desc'      => __('WooCommerce Product Item Detail', 'unicon')
            ),

            array(
                'id'       => 'switch_shopupsells',
                'type'     => 'switch', 
                'title'    => __('Upsells Products', 'unicon'),
                'subtitle' => __('Enable / Disable to show upsells Products on Product Item Details', 'unicon'),
                'default'  => false,
            ),

            array(
                'id'       => 'switch_shoprelatedproducts',
                'type'     => 'switch', 
                'title'    => __('Related Products', 'unicon'),
                'subtitle' => __('Enable / Disable to show related Products on Product Item Details', 'unicon'),
                'default'  => true,
            ),

            

        ),
    ) );
    
    } // end check woocommerce

    // check if woocommerce plugin installed
    if ( class_exists('bbPress') ) {

    /* bbPress /--------------------------------------------------------- */
    Redux::setSection( $opt_name, array(
        'title'     => __('bbPress', 'unicon'),
        'icon'      => 'el-icon-bullhorn',
        'fields'    => array(

            array(
                'id'        => 'bbpress-general',
                'type'      => 'info',
                'desc'      => __('bbPress General', 'unicon')
            ),

            array(
                'id'       => 'select_bbpresssidebar',
                'type'     => 'image_select',
                'title'    => __('bbPress Sidebar Position', 'unicon'), 
                'subtitle' => __('bbPress Listing Sidebar Position', 'unicon'),
                'options'  => array(
                    'no-sidebar'      => array(
                        'alt'   => 'No Sidebar', 
                        'img'  => get_template_directory_uri().'/framework/images/admin/layout-3.jpg'
                    ),
                    'sidebar-left'      => array(
                        'alt'   => 'Sidebar Left', 
                        'img'   => get_template_directory_uri().'/framework/images/admin/layout-1.jpg'
                    ),
                    'sidebar-right'      => array(
                        'alt'   => 'Sidebar Right', 
                        'img'   => get_template_directory_uri().'/framework/images/admin/layout-2.jpg'
                    ),
                ),
                'default'  => 'no-sidebar',
            ),

        ),
    ) );
    
    } // end check bbpress

    /* Lightbox /--------------------------------------------------------- */
    Redux::setSection( $opt_name, array(
        'title'     => __('Lightbox', 'unicon'),
        'icon'      => 'el-icon-picture',
        'fields'    => array(

            array(
                'id'        => 'lightbox-general',
                'type'      => 'info',
                'desc'      => __('General Lightbox Settings', 'unicon')
            ),

            array(
                'id'       => 'lightbox_automatic',
                'type'     => 'switch', 
                'title'    => __('Automatic Lightbox for Images', 'unicon'),
                'subtitle' => __('Enable / Disable automatic lightbox for all links that link to an image. The lightbox is still active for links with class=prettyPhoto', 'unicon'),
                'default'  => true,
            ),

            array(
                'id'       => 'lightbox_smartphones',
                'type'     => 'switch', 
                'title'    => __('Lightbox on Smartphones', 'unicon'),
                'subtitle' => __('Enable / Disable Lightbox Images on small devices (under 500px width)', 'unicon'),
                'default'  => true,
            ),

            array(
                'id'        => 'lightbox-options',
                'type'      => 'info',
                'desc'      => __('Lightbox Options', 'unicon')
            ),

            array(
                'id'       => 'lightbox_animation_speed',
                'type'     => 'select',
                'title'    => __('Animation Speed', 'unicon'), 
                'options'  => array(
                    'fast' => 'Fast',
                    'normal' => 'Normal',
                    'slow' => 'Slow'
                ),
                'default'  => 'fast',
            ),

            array(
                'id'       => 'lightbox_opacity',
                'type'     => 'text',
                'title'    => __('Background Opacity', 'unicon'),
                'default'  => '0.8'
            ),

            array(
                'id'       => 'lightbox_title',
                'type'     => 'switch', 
                'title'    => __('Show Title', 'unicon'),
                'subtitle' => __('Enable / Disable to show the Title', 'unicon'),
                'default'  => false,
            ),

            array(
                'id'       => 'lightbox_gallery',
                'type'     => 'switch', 
                'title'    => __('Show Gallery Thumbnails', 'unicon'),
                'subtitle' => __('Enable / Disable to show the Gallery Thumbnails', 'unicon'),
                'default'  => false,
            ),

            array(
                'id'       => 'lightbox_autoplay',
                'type'     => 'switch', 
                'title'    => __('Autoplay Gallery', 'unicon'),
                'subtitle' => __('Enable / Disable to autoplay the Lughtbox Gallery', 'unicon'),
                'default'  => false,
            ),

            array(
                'id'       => 'lightbox_slideshow_speed',
                'type'     => 'text',
                'title'    => __('Autoplay Gallery Speed', 'unicon'),
                'subtitle' => __('Select the slideshow speed in ms. (Default: 5000, 1000 ms = 1 second)', 'unicon'),
                'default'  => '5000',
                'required' => array('lightbox_autoplay', "=", '1'),
            ),

            array(
                'id'       => 'lightbox_social',
                'type'     => 'switch', 
                'title'    => __('Social Icons', 'unicon'),
                'subtitle' => __('Enable to show social sharing icons.', 'unicon'),
                'default'  => false,
            ),

        ),
    ) );

    /* Custom CSS /--------------------------------------------------------- */
    Redux::setSection( $opt_name, array(
        'title'     => __('Custom CSS', 'unicon'),
        'icon'      => 'el-icon-adjust-alt',
        'fields'    => array(

            array(
                'id'        => 'customcss',
                'type'      => 'info',
                'desc'      => __('Custom CSS', 'unicon')
            ),

             array(
                'id'     => 'opt-info-normal',
                'type'   => 'info',
                'notice' => false,
                'title'  => __( '', 'unicon' ),
                'desc'   => __( '* The CSS written here will not be lost when you update the theme.<br/>
* Sometimes you need to add !important rule to overwrite the default value set by the theme, example: <strong>font-size: 18px !important;</strong>', 'unicon' )
            ),

            array(
                'id'        => 'textarea_csscode',
                'type'      => 'ace_editor',
                'title'     => __('CSS Code', 'unicon'),
                'subtitle'  => __('Advanced CSS Options. You can paste your custom CSS Code here.', 'unicon'),
                'mode'      => 'css',
                'validate' => 'css',
                'theme'     => 'chrome',
                'default'   => ""
            ),

            array(
                'id'        => 'responsivecss',
                'type'      => 'info',
                'desc'      => __('Responsive CSS - Targeting custom screen sizes', 'unicon')
            ),

            array(
                'id'        => 'textarea_csscode_xl',
                'type'      => 'ace_editor',
                'title'     => __('Extra Large Screen (Desktop)', 'unicon'),
                'subtitle'  => __('Screen size larger than 1200px', 'unicon'),
                'mode'      => 'css',
                'validate' => 'css',
                'theme'     => 'chrome',
                'default'   => ""
            ),

            array(
                'id'        => 'textarea_csscode_l',
                'type'      => 'ace_editor',
                'title'     => __('Large Screen (iPad Landscape)', 'unicon'),
                'subtitle'  => __('Screen size between 960px and 1199px', 'unicon'),
                'mode'      => 'css',
                'validate' => 'css',
                'theme'     => 'chrome',
                'default'   => ""
            ),

            array(
                'id'        => 'textarea_csscode_m',
                'type'      => 'ace_editor',
                'title'     => __('Medium Screen (iPad Portrait)', 'unicon'),
                'subtitle'  => __('Screen size between 768px and 959px', 'unicon'),
                'mode'      => 'css',
                'validate' => 'css',
                'theme'     => 'chrome',
                'default'   => ""
            ),

            array(
                'id'        => 'textarea_csscode_s',
                'type'      => 'ace_editor',
                'title'     => __('Small Screen (iPhone Landscape)', 'unicon'),
                'subtitle'  => __('Screen size between 480px and 767px', 'unicon'),
                'mode'      => 'css',
                'validate' => 'css',
                'theme'     => 'chrome',
                'default'   => ""
            ),

            array(
                'id'        => 'textarea_csscode_xs',
                'type'      => 'ace_editor',
                'title'     => __('Extra Small Screen (iPhone Portrait)', 'unicon'),
                'subtitle'  => __('Screen size smaller than 479px', 'unicon'),
                'mode'      => 'css',
                'validate' => 'css',
                'theme'     => 'chrome',
                'default'   => ""
            ),

        ),
    ) );
    
    /* Import & Export /--------------------------------------------------------- */
    Redux::setSection( $opt_name, array(
        'title'     => __('Import / Export', 'unicon'),
        'icon'      => 'el-icon-refresh',
        'fields'    => array(

            array(
                'id'        => 'import-export',
                'type'      => 'info',
                'desc'      => __('Import & Export Theme Options Settings', 'unicon')
            ),

            array(
                'id'            => 'opt-import-export',
                'type'          => 'import_export',
                'title'         => 'Import Export',
                'subtitle'      => 'Save and restore your Redux options',
                'full_width'    => false,
            ),
        ),
    ) );

/* ------------------------------------------------------------------------ */
/* Custom function for Mintitheme's own CSS
/* ------------------------------------------------------------------------ */
function minti_enqueue_admin_css() {
    wp_enqueue_style( 'minti-admin-css', get_template_directory_uri() . '/framework/admin/admin-custom.css');
}
add_action( 'admin_print_scripts', 'minti_enqueue_admin_css', 12 );

/* ------------------------------------------------------------------------ */
/* Remove Redux About Page
/* ------------------------------------------------------------------------ */
if(is_admin()) {
    function minti_remove_redux_about() {
        remove_submenu_page('tools.php', 'redux-about');
    }
    add_action('admin_menu', 'minti_remove_redux_about', 12);
}
