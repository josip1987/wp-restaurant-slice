<?php 
    function wp_restaurant_options() {
        add_menu_page(
            'Restaurant', 
            'My Restaurant Options',
            'administrator', 
            'wp_restaurant_options',
            'wp_restaurant_adjustments',
            '', // no icon
            20 // position
        );
        
        add_submenu_page(
            'wp_restaurant_options',
            'Reservations',
            'Reservations',
            'administrator',
            'wp_restaurant_reservations',
            'wp_restaurant_reservations' // callback
        );
    }

    add_action('admin_menu', 'wp_restaurant_options');

    function wp_restaurant_settings() {
        
        // Google Maps Group
        
        register_setting('google_maps_options', 'google_maps_latitude');
        register_setting('google_maps_options', 'google_maps_longitude');
        register_setting('google_maps_options', 'google_maps_zoom');
        register_setting('google_maps_options', 'google_maps_ApiKey');
        
        // Information Group
        
        register_setting('additional_options', 'wp_restaurant_address');
        register_setting('additional_options', 'wp_restaurant_phone');
    }

    add_action('init', 'wp_restaurant_options');

    function wp_restaurant_adjustments() { ?>
        <div class="wrap">
            <h1>Your Custom Adjustments</h1>
            <form action="options.php" method="post">
                <?php
                    settings_fields('google_maps_options');
                    do_settings_sections('google_maps_options');
                ?>
                <h2>Google Maps</h2>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">Latitude: </th>
                        <td>
                            <input type="text" name="google_maps_latitude" 
                            value="<?php echo esc_attr( get_option('google_maps_latitude') ); ?>" >
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Longitude: </th>
                        <td>
                            <input type="text" name="google_maps_longitude" 
                            value="<?php echo esc_attr( get_option('google_maps_longitude') ); ?>" >
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Zoom Distance to Map: </th>
                        <td>
                            <input type="text" name="google_maps_zoom" 
                            value="<?php echo esc_attr( get_option('google_maps_zoom') ); ?>" >
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Api Key: </th>
                        <td>
                            <input type="text" name="google_maps_ApiKey" 
                            value="<?php echo esc_attr( get_option('google_maps_ApiKey') ); ?>" >
                        </td>
                    </tr>
                </table>
                
                <?php
                    settings_fields('additional_options');
                    do_settings_sections('additional_options');
                ?>
                <h2>Edit Additional Info</h2>
                
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">Address: </th>
                        <td>
                            <input type="text" name="wp_restaurant_address" 
                            value="<?php echo esc_attr( get_option('wp_restaurant_address') ); ?>" >
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Phone Number: </th>
                        <td>
                            <input type="text" name="wp_restaurant_phone" 
                            value="<?php echo esc_attr( get_option('wp_restaurant_phone') ); ?>" >
                        </td>
                    </tr>
                </table> 
                
                <?php submit_button(); ?>
            </form>
        </div>
    <?php }

    function wp_restaurant_reservations() { ?>
        <div class="wrap">
            <h1>Reservations</h1>
            <table class="wp-list-table widefat striped">
                <thead>
                    <tr>
                        <th class="manage-column">ID</th>
                        <th class="manage-column">Name</th>
                        <th class="manage-column">Date of Reservation</th>
                        <th class="manage-column">Email</th>
                        <th class="manage-column">Phone Number</th>
                        <th class="manage-column">Message</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php 
                        global $wpdb;
                        $table = $wpdb->prefix . 'reservations';
                        $reservations = $wpdb->get_results("SELECT * FROM $table", ARRAY_A);
                        
                        foreach($reservations as $reservation): ?>
                            
                            <tr>
                                <td><?php echo $reservation['id']; ?></td>
                                <td><?php echo $reservation['name']; ?></td>
                                <td><?php echo $reservation['date']; ?></td>
                                <td><?php echo $reservation['email']; ?></td>
                                <td><?php echo $reservation['phone']; ?></td>
                                <td><?php echo $reservation['message']; ?></td>
                            </tr>
                            
                        <?php endforeach; ?>
                </tbody>
            </table>
        </div>

<?php }

?>







