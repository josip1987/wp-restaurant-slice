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

    function wp_restaurant_adjustments() {
        
    }

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







