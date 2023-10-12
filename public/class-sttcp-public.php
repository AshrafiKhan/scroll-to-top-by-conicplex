<?php
class SSTCP_PUBLIC
{

    /*
    * Enqueue script and style callback
    */
    public function sttcp_enqueue_scripts_callback()
    {

        // sttcp style
        wp_enqueue_style('sttcp-style', plugin_dir_url(__FILE__) . 'css/sttcp-style.css', [], SSTCP_VERSION);

        // jQuery
        wp_enqueue_script('jquery');

        // sttcp script
        wp_enqueue_script('sttcp-script', plugin_dir_url(__FILE__) . 'js/sttcp-script.js', ['jquery'], SSTCP_VERSION, true);
    }


    /* 
    * Scroll to top callback
    */
    public function sttcp_scroll_to_top_callback()
    {

        // Get sstcp options
        $sstcp_options = !empty(get_option('sstcp_options')) ? get_option('sstcp_options') : [];
        $bg_color = !empty($sstcp_options['bg_color']) ? esc_attr($sstcp_options['bg_color']) : '#FFFFFF';
        $height = !empty($sstcp_options['height']) ? esc_attr($sstcp_options['height']) : '50';
        $width = !empty($sstcp_options['width']) ? esc_attr($sstcp_options['width']) : '50';
        $border_radius = !empty($sstcp_options['border_radius']) ? esc_attr($sstcp_options['border_radius']) : '50';
        $right = !empty($sstcp_options['right']) ? esc_attr($sstcp_options['right']) : '25';

        ob_start();
?>
        <style>
            .sttcp{
                background-color: <?php echo $bg_color ?>;
                height: <?php echo $height."px" ?>;
                width: <?php echo $width."px" ?>;
                border-radius: <?php echo $border_radius."%" ?>;
                right: <?php echo $right."%" ?>;
            }
        </style>
        <div class="sttcp">
            <img class="sttcp-icon" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bd/Top_Arrow.svg/1200px-Top_Arrow.svg.png" alt="<?php _e('Scroll to Top', 'sttcp'); ?>" />
        </div>
<?php
        return ob_get_contents();
    }
}
