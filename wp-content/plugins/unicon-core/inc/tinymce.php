<?php
/*-----------------------------------------------------------------------------------*/
/* Add Shortcode Button in MCE Editor 
/*-----------------------------------------------------------------------------------*/
if (get_theme_mod('editor_shortcodes_enable', true)) {

    function minti_shortcodes_add_mce_button() {
        if (! current_user_can('edit_posts') && !current_user_can('edit_pages')) {
            return;
        }
        if ('true' == get_user_option('rich_editing')) {
            add_filter('mce_external_plugins', 'minti_shortcodes_add_tinymce_plugin');
            add_filter('mce_buttons', 'minti_shortcodes_register_mce_button');
        }
    }
    add_action('admin_head', 'minti_shortcodes_add_mce_button');

    function minti_shortcodes_add_tinymce_plugin($plugin_array) {
        $plugin_array['minti_shortcodes_mce_button'] = UNICON_CORE_PLUGIN_PATH . '/js/unicon-mce.js';
        return $plugin_array;
    }

    function minti_shortcodes_register_mce_button($buttons) {
        array_push($buttons, 'minti_shortcodes_mce_button');
        return $buttons;
    }

    function minti_shortcodes_tinymce_json() {
        $data = array();
        $data['btnLabel']   = esc_html__('Shortcodes', 'unicon-framework');
        $data['shortcodes'] = array(
            'alert' => array(
                'text' => esc_html__('Alert', 'unicon-framework'),
                'insert' => '[minti_alert type="warning" close="true"]This is an alert[/minti_alert]',
            ),
            'blockquote' => array(
                'text' => esc_html__('Blockquote', 'unicon-framework'),
                'insert' => '[minti_blockquote]This is a Blockquote[/minti_blockquote]',
            ),
            'button' => array(
                'text' => esc_html__('Button', 'unicon-framework'),
                'insert' => '[minti_button link="http://example.com" size="medium" target="_self" lightbox="no" color="color-1" icon="fa-phone"]Click Me![/minti_button]',
            ),
            'centertext' => array(
                'text' => esc_html__('Center Text', 'unicon-framework'),
                'insert' => '[minti_center]Centered Text[/minti_center]',
            ),
            'counter' => array(
                'text' => esc_html__('Counter', 'unicon-framework'),
                'insert' => '[minti_counter number="197" title="Cups of Coffee" color="#666666"]',
            ),
            'dropcap' => array(
                'text' => esc_html__('Dropcap', 'unicon-framework'),
                'insert' => '[minti_dropcap style="circle"]R[/minti_dropcap]',
            ),
            'googlefont' => array(
                'text' => esc_html__('Google Font', 'unicon-framework'),
                'insert' => '[minti_googlefont font="Swanky and Moo Moo" size="42px" margin="0px 0px 20px 0px"]This ia a Google Font Text[/minti_googlefont]',
            ),
            'divider' => array(
                'text' => esc_html__('Divider', 'unicon-framework'),
                'insert' => '[minti_divider style="1" icon="fa-phone" margin="60px 0px 60px 0px"]',
            ),
            'icon' => array(
                'text' => esc_html__('Icon', 'unicon-framework'),
                'insert' => '[minti_icon icon="fa-phone" color="#888888" size="14px" margin="0px 0px 0px 0px"]',
            ),
            'list' => array(
                'text' => esc_html__('List', 'unicon-framework'),
                'insert' => '[minti_list][minti_listitem icon="fa-check"]Bullet Point 1[/minti_listitem][minti_listitem icon="fa-check"]Bullet Point 2[/minti_listitem][/minti_list]',
            ),
            'progressbar' => array(
                'text' => esc_html__('Progressbar', 'unicon-framework'),
                'insert' => '[minti_progressbar percentage="90" title="Photoshop Skills" color="#999999"]',
            ),
            'pullquote' => array(
                'text' => esc_html__('Pullquote', 'unicon-framework'),
                'insert' => '[minti_pullquote align="left"]This is a Pullquote[/minti_pullquote]',
            ),
            'social' => array(
                'text' => esc_html__('Social', 'unicon-framework'),
                'insert' => '[minti_social icon="fa-facebook" url="http://facebook.com" target="_blank"]',
            ),
            'spacer' => array(
                'text' => esc_html__('Spacer', 'unicon-framework'),
                'insert' => '[minti_spacer height="40"]',
            ),
            'testimonial' => array(
                'text' => esc_html__('Testimonial', 'unicon-framework'),
                'insert' => '[minti_testimonial author="John Doe"]This is a Testimonial[/minti_testimonial]',
            ),
            'title' => array(
                'text' => esc_html__('Title', 'unicon-framework'),
                'insert' => '[minti_title align="center" margin="0px 0px 20px 0px"]This is a Title[/minti_title]',
            ),
            'tooltip' => array(
                'text' => esc_html__('Tooltip', 'unicon-framework'),
                'insert' => '[minti_tooltip text="Tooltip Text"]This text has a tooltip[/minti_tooltip]',
            ),
            'visibility' => array(
                'text' => esc_html__('Visibility', 'unicon-framework'),
                'insert' => '[minti_visibility show="mobile"]This text is only visible on Mobile.[/minti_visibility]',
            ),
        );

        $data = apply_filters('minti_shortcodes_tinymce_json', $data); ?>

        <script>var mintiTinymce = <?php echo wp_json_encode($data); ?> ;</script>

    <?php }
    add_action('admin_footer', 'minti_shortcodes_tinymce_json');

}
