<?php
class SSTCP_ADMIN
{

    // Admin menu
    public function admin_menu()
    {
        add_menu_page(
            __('Scroll to Top Settings by ConicPlex', 'sstcp'),
            __('Scroll to Top Settings', 'sstcp'),
            'manage_options',
            'scroll-to-top-settings-by-conicplex',
            [$this, 'admin_menu_callback'],
            'dashicons-arrow-up-alt',
            65
        );
    }

    public function admin_menu_callback()
    {

        if (isset($_POST['sstcp_submit'])) {
            $sstcp_options = [];
            $sstcp_options['bg_color'] = sanitize_hex_color($_POST['bg_color']);
            
            $sstcp_options['height'] = absint($_POST['height']);
            $sstcp_options['width'] = absint($_POST['width']);
            $sstcp_options['border_radius'] = absint($_POST['border_radius']);
            $sstcp_options['right'] = absint($_POST['right']);

            

            if (update_option('sstcp_options', $sstcp_options, false)) {

?>
                <div class="notice notice-success is-dismissible">
                    <p><strong>Settings saved.</strong></p>
                </div>
        <?php
            }
        }

        // Get sstcp options
        $sstcp_options = !empty(get_option('sstcp_options')) ? get_option('sstcp_options') : [];
        $bg_color = !empty($sstcp_options['bg_color']) ? esc_attr($sstcp_options['bg_color']) : '#FFFFFF';
        $height = !empty($sstcp_options['height']) ? esc_attr($sstcp_options['height']) : '50';
        $width = !empty($sstcp_options['width']) ? esc_attr($sstcp_options['width']) : '50';
        $border_radius = !empty($sstcp_options['border_radius']) ? esc_attr($sstcp_options['border_radius']) : '50';
        $right = !empty($sstcp_options['right']) ? esc_attr($sstcp_options['right']) : '25';

        ?>
        <div class="wrap">
            <h1><?php _e('Scroll to Top Settings by ConicPlex', 'sstcp'); ?></h1>
            <form method="post" action="">

                <table class="form-table" role="presentation">
                    <tbody>
                        <!-- To Change the Background color -->
                        <tr>
                            <th scope="row"><label for="bg_color"><?php _e('Background Color:', 'sstcp'); ?></label></th>
                            <td>
                                <input name="bg_color" type="color" id="bg_color" value="<?php echo $bg_color ?>" class="regular-text">
                            </td>
                        </tr>

                        <!-- To Change the Height -->
                        <tr>
                            <th scope="row"><label for="height"><?php _e('Height(px):', 'sstcp'); ?></label></th>
                            <td>
                                <input name="height" type="number" id="height" value="<?php echo $height ?>" class="regular-text">
                            </td>
                        </tr>

                        <!-- To Change the Width -->
                        <tr>
                            <th scope="row"><label for="width"><?php _e('Width(px):', 'sstcp'); ?></label></th>
                            <td>
                                <input name="width" type="number" id="width" value="<?php echo $width ?>" class="regular-text">
                            </td>
                        </tr>

                        <!-- To Change the Border Radius -->
                        <tr>
                            <th scope="row"><label for="border_radius"><?php _e('Border-radius(%):', 'sstcp'); ?></label></th>
                            <td>
                                <input name="border_radius" type="number" max="100" min="0" id="border_radius" value="<?php echo $border_radius ?>" class="regular-text">
                                <p class="description" id="timezone-description"> Choose either a city in the same timezone as you or a <abbr>UTC</abbr> (Coordinated Universal Time) time offset.</p>
                            </td>
                        </tr>

                        <!-- To Change the Right -->
                        <tr>
                            <th scope="row"><label for="right"><?php _e('Right(%):', 'sstcp'); ?></label></th>
                            <td>
                                <input name="right" type="number" max="100" min="0" id="right" value="<?php echo $right ?>" class="regular-text">
                            </td>
                        </tr>
                    </tbody>
                </table>

                <?php submit_button('', 'primary', 'sstcp_submit'); ?>
            </form>
        </div>
<?php
    }
}
