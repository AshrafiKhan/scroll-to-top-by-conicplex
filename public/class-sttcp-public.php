<?php
class STTCP_PUBLIC
{

    /*
    * Enqueue script and style callback
    */
    public function sttcp_enqueue_scripts_callback()
    {

        // sttcp style
        wp_enqueue_style('sttcp-style', plugin_dir_url(__FILE__) . 'css/sttcp-style.css', [], STTCP_VERSION);

        // jQuery
        wp_enqueue_script('jquery');

        // sttcp script
        wp_enqueue_script('sttcp-script', plugin_dir_url(__FILE__) . 'js/sttcp-script.js', ['jquery'], STTCP_VERSION, true);
    }


    /* 
    * Scroll to top callback
    */
    public function sttcp_scroll_to_top_callback()
    {

        // Get sttcp options
        $sttcp_options = !empty(get_option('sttcp_options')) ? get_option('sttcp_options') : [];
        $bg_color = !empty($sttcp_options['bg_color']) ? esc_attr($sttcp_options['bg_color']) : '#FFFFFF';
        $height = !empty($sttcp_options['height']) ? esc_attr($sttcp_options['height']) : '50';
        $width = !empty($sttcp_options['width']) ? esc_attr($sttcp_options['width']) : '50';
        $border_radius = !empty($sttcp_options['border_radius']) ? esc_attr($sttcp_options['border_radius']) : '50';

        $align_horizontal_icon = !empty($sttcp_options['align_horizontal_icon']) ? esc_attr($sttcp_options['align_horizontal_icon']) : 'right';
        $align_horizontal_icon_value = !empty($sttcp_options['align_horizontal_icon_value']) ? esc_attr($sttcp_options['align_horizontal_icon_value']) : '25';

        // $right = !empty($sttcp_options['right']) ? esc_attr($sttcp_options['right']) : '25';

        $align_vertical_icon = !empty($sttcp_options['align_vertical_icon']) ? esc_attr($sttcp_options['align_vertical_icon']) : 'bottom';
        $align_vertical_icon_value = !empty($sttcp_options['align_vertical_icon_value']) ? esc_attr($sttcp_options['align_vertical_icon_value']) : '25';

        // $bottom = !empty($sttcp_options['bottom']) ? esc_attr($sttcp_options['bottom']) : '25';
        $padding = !empty($sttcp_options['padding']) ? esc_attr($sttcp_options['padding']) : '0';
        $icon = !empty($sttcp_options['icon']) ? esc_url($sttcp_options['icon']) : plugin_dir_url(__FILE__) . 'images/arrow-top-icon.png';

        $additional_css = !empty($sttcp_options['additional_css']) ? esc_attr($sttcp_options['additional_css']) : '';

        ob_start();
?>
        <style>
            .sttcp {
                background-color: <?php echo $bg_color ?>;
                height: <?php echo $height . "px" ?>;
                width: <?php echo $width . "px" ?>;
                border-radius: <?php echo $border_radius . "%" ?>;
                <?php echo $align_horizontal_icon ?>: <?php echo $align_horizontal_icon_value . "px" ?>;
                <?php echo $align_vertical_icon ?>: <?php echo $align_vertical_icon_value . "px" ?>;
                padding: <?php echo $padding . "px" ?>;
            }

            <?php echo $additional_css; ?>
        </style>
        <div class="sttcp">
            <img class="sttcp-icon" src="<?php echo $icon ?>" alt="<?php _e('Scroll to Top', 'sttcp'); ?>" />
        </div>
<?php
        return ob_get_contents();
    }
}
