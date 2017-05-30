<?php 
    function wp_restaurant_save_reservation() {
        global $wpdb;
                                                // bot check
        if(isset($_POST['reservation']) && $_POST['hidden'] == "1") {
            $name = sanitize_text_field($_POST['name']);
            $date = sanitize_text_field($_POST['date']);
            $email = sanitize_email($_POST['email']);
            $phone = sanitize_text_field($_POST['phone']);
            $message = sanitize_text_field($_POST['message']);
            
            $table = $wpdb->prefix . 'reservations';
            
            $data = array(
                'name' => $name,
                'date' => $date,
                'email' => $email,
                'phone' => $phone,
                'message' => $message
            );
            
            // format as string
            
            $format = array(
                '%s',
                '%s',
                '%s',
                '%s',
                '%s'
            );
            
            $wpdb->insert($table, $data, $format);
            
            // redirect after submission
            $url = get_page_by_title('Thanks for your inquiry!');
            wp_redirect( get_permalink($url) );
            
            //do not forget to exit
            exit(); 
        }
    }

add_action('init', 'wp_restaurant_save_reservation');
?>