<?php
class STTCP_ADMIN
{

    // Admin menu
    public function admin_menu()
    {
        add_menu_page(
            __('Scroll to Top Settings by ConicPlex', 'sttcp'),
            __('Scroll to Top Settings', 'sttcp'),
            'manage_options',
            'scroll-to-top-settings-by-conicplex',
            [$this, 'admin_menu_callback'],
            'dashicons-arrow-up-alt',
            65
        );
    }


    /*
    * Enqueue script and style callback
    */
    public function sttcp_enqueue_scripts_callback()
    {

        // sttcp style
        wp_enqueue_style('sttcp-admin-style', plugin_dir_url(__FILE__) . 'css/sttcp-admin-style.css', [], STTCP_VERSION);

        // jQuery
        wp_enqueue_script('jquery');

        // Include wp media
        wp_enqueue_media();

        // sttcp script
        wp_enqueue_script('sttcp-admin-script', plugin_dir_url(__FILE__) . 'js/sttcp-admin-script.js', ['jquery'], STTCP_VERSION, true);
    }

    public function admin_menu_callback()
    {

        if (isset($_POST['sttcp_submit'])) {
            $sttcp_options = [];
            $sttcp_options['bg_color'] = sanitize_hex_color($_POST['bg_color']);

            $sttcp_options['height'] = absint($_POST['height']);
            $sttcp_options['width'] = absint($_POST['width']);
            $sttcp_options['border_radius'] = absint($_POST['border_radius']);

            $sttcp_options['align_horizontal_icon'] = sanitize_text_field($_POST['align_horizontal_icon']);
            $sttcp_options['align_horizontal_icon_value'] = absint($_POST['align_horizontal_icon_value']);

            $sttcp_options['align_vertical_icon'] = sanitize_text_field($_POST['align_vertical_icon']);
            $sttcp_options['align_vertical_icon_value'] = absint($_POST['align_vertical_icon_value']);


            // $sttcp_options['bottom'] = absint($_POST['bottom']);
            $sttcp_options['padding'] = absint($_POST['padding']);

            $sttcp_options['icon'] = sanitize_url($_POST['icon']);

            $sttcp_options['additional_css'] = sanitize_textarea_field($_POST['additional_css']);


            if (update_option('sttcp_options', $sttcp_options, false)) {

?>
                <div class="notice notice-success is-dismissible">
                    <p><strong>Settings saved.</strong></p>
                </div>
        <?php
            }
        }

        // Get sttcp options
        $sttcp_options = !empty(get_option('sttcp_options')) ? get_option('sttcp_options') : [];
        $bg_color = !empty($sttcp_options['bg_color']) ? esc_attr($sttcp_options['bg_color']) : '#FFFFFF';
        $height = !empty($sttcp_options['height']) ? esc_attr($sttcp_options['height']) : '50';
        $width = !empty($sttcp_options['width']) ? esc_attr($sttcp_options['width']) : '50';
        $border_radius = !empty($sttcp_options['border_radius']) ? esc_attr($sttcp_options['border_radius']) : '50';

        $align_horizontal_icon = !empty($sttcp_options['align_horizontal_icon']) ? esc_attr($sttcp_options['align_horizontal_icon']) : 'right';
        $align_horizontal_icon_value = !empty($sttcp_options['align_horizontal_icon_value']) ? esc_attr($sttcp_options['align_horizontal_icon_value']) : '25';

        $align_vertical_icon = !empty($sttcp_options['align_vertical_icon']) ? esc_attr($sttcp_options['align_vertical_icon']) : 'bottom';
        $align_vertical_icon_value = !empty($sttcp_options['align_vertical_icon_value']) ? esc_attr($sttcp_options['align_vertical_icon_value']) : '25';

        // $bottom = !empty($sttcp_options['bottom']) ? esc_attr($sttcp_options['bottom']) : '25';
        $padding = !empty($sttcp_options['padding']) ? esc_attr($sttcp_options['padding']) : '10';
        $icon = !empty($sttcp_options['icon']) ? esc_url($sttcp_options['icon']) : plugin_dir_url(__FILE__) . 'images/arrow-top-icon.png';

        $additional_css = !empty($sttcp_options['additional_css']) ? esc_attr($sttcp_options['additional_css']) : ".sttcp{\n\n}";

        ?>
        <div class="wrap">
            <h1><?php _e('Scroll to Top Settings by ConicPlex', 'sttcp'); ?></h1>
            <form method="post" action="">

                <table class="form-table" role="presentation">
                    <tbody>
                        <!-- To Change the Background color -->
                        <tr>
                            <th scope="row"><label for="bg_color"><?php _e('Background Color:', 'sttcp'); ?></label></th>
                            <td>
                                <input name="bg_color" type="color" id="bg_color" value="<?php echo $bg_color ?>" class="regular-text">
                                <p class="description" id="timezone-description"> Choose Background Color for the icon</p>

                            </td>
                        </tr>

                        <!-- To Change the Height -->
                        <tr>
                            <th scope="row"><label for="height"><?php _e('Height  :', 'sttcp'); ?></label></th>
                            <td>
                                <input name="height" type="number" min="1" max="200" id="height" value="<?php echo $height ?>" class="regular-text">
                                <p class="description" id="timezone-description"> Choose Height in pixels (px) for the icon</p>

                            </td>
                        </tr>

                        <!-- To Change the Width -->
                        <tr>
                            <th scope="row"><label for="width"><?php _e('Width  :', 'sttcp'); ?></label></th>
                            <td>
                                <input name="width" type="number" min="1" max="200" id="width" value="<?php echo $width ?>" class="regular-text">
                                <p class="description" id="timezone-description"> Choose Width in pixels (px) for the icon</p>
                            </td>
                        </tr>

                        <!-- To Change the Border Radius -->
                        <tr>
                            <th scope="row"><label for="border_radius"><?php _e('Border Radius  :', 'sttcp'); ?></label></th>
                            <td>
                                <input name="border_radius" type="number" max="100" min="0" id="border_radius" value="<?php echo $border_radius ?>" class="regular-text">
                                <p class="description" id="timezone-description"> Choose Border Radius in percentage (%) for the icon</p>
                            </td>
                        </tr>

                        <!-- To Change the Horizontal Alignment -->
                        <tr>
                            <th scope="row">
                                <label for="align-horizontal-icon">
                                    <?php _e('Align Icon Horizontally :', 'sttcp'); ?>
                                </label>

                            </th>
                            <td>
                                <div class="sttcp-align-horizontal-icon">
                                    <select name="align_horizontal_icon" class="sttcp-align-horizontal-icon-select" id="align-horizontal-icon">
                                        <option <?php if ($align_horizontal_icon == 'right') {
                                                    echo 'selected';
                                                } ?> value="right">Right</option>
                                        <option <?php if ($align_horizontal_icon == 'left') {
                                                    echo 'selected';
                                                } ?> value="left">Left</option>
                                    </select>
                                    <input name="align_horizontal_icon_value" type="number" max="400" min="0" id="align_horizontal_icon_value" value="<?php echo $align_horizontal_icon_value ?>" class="sttcp-align-horizontal-icon-input">
                                </div>
                                <p class="description" id="timezone-description"> Choose Icon Position Horizontally in pixels (px)</p>

                            </td>
                        </tr>

                        <!-- To Change the Horizontal Alignment -->
                        <tr>
                            <th scope="row">
                                <label for="align-vertical-icon">
                                    <?php _e('Align Icon Vertically :', 'sttcp'); ?>
                                </label>

                            </th>
                            <td>
                                <div class="sttcp-align-vertical-icon">
                                    <select name="align_vertical_icon" class="sttcp-align-vertical-icon-select" id="align-vertical-icon">
                                        <option <?php if ($align_vertical_icon == 'top') {
                                                    echo 'selected';
                                                } ?> value="top">Top</option>
                                        <option <?php if ($align_vertical_icon == 'bottom') {
                                                    echo 'selected';
                                                } ?> value="bottom">Bottom</option>
                                    </select>
                                    <input name="align_vertical_icon_value" type="number" max="400" min="0" id="align_vertical_icon_value" value="<?php echo $align_vertical_icon_value ?>" class="sttcp-align-vertical-icon-input">
                                </div>
                                <p class="description" id="timezone-description"> Choose Icon Position Vertically in pixels (px)</p>

                            </td>
                        </tr>


                        <!-- To Change the Padding -->
                        <tr>
                            <th scope="row"><label for="padding"><?php _e('Padding (px) :', 'sttcp'); ?></label></th>
                            <td>
                                <input name="padding" type="number" max="100" min="0" id="padding" value="<?php echo $padding ?>" class="regular-text">
                                <p class="description" id="timezone-description"> Choose Padding in pixels(px) for the icon.</p>
                            </td>
                        </tr>

                        <!-- To Change the image -->
                        <tr>
                            <th scope="row"><label for=""><?php _e('Image :', 'sttcp'); ?></label></th>
                            <td>
                                <div class="sttcp-icon">
                                    <img class="sttcp-icon-img" src="<?php echo $icon; ?>" />
                                    <input class="sttcp-icon-input" type="hidden" value="<?php echo $icon; ?>" name="icon" />
                                </div>
                            </td>
                        </tr>

                        <!-- To Change the Additional CSS -->
                        <tr>
                            <th scope="row"><label for="additional_css"><?php _e('Additional CSS :', 'sttcp'); ?></label></th>
                            <td>
                                <textarea name="additional_css" id="additional_css" class="regular-text" rows="10"><?php echo $additional_css ?></textarea>
                                <p class="description" id="timezone-description"> Additional CSS for icon with .sttcp class name.</p>
                            </td>
                        </tr>

                        <!-- Submit Button -->
                        <?php submit_button('', 'primary', 'sttcp_submit'); ?>
            </form>
        </div>
<?php
    }
}
