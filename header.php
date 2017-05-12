<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>La Pizzeria</title>
	<?php wp_head(); ?>
</head>
<body>
	<header class="site-header">
        <div class="container">
            <div class="logo">
                <a href="<?php echo esc_url( home_url('/') ); ?>">
                    <img src="<?php echo get_template_directory_uri() ?>/app/assets/images/logo.svg" class="logoimage" alt="Logo">
                </a>
            </div> <!-- /.logo -->
            <div class="header-information">
                <div class="socials">
                    <?php 
                        $args = array(
                            'theme_location' => 'social-menu',
                            'container' => 'nav',
                            'container_class' => 'socials',
                            'container_id' => 'socials',
                            'link_before' => '<span class="sr-text">',
                            'link_after' => '</span>'
                        );
                        wp_nav_menu($args);
                    ?>
                </div>
                <div class="address">
                    <p>2343 Bay Avenue Mountain View, CA 90210</p>
                    <p>Phone Number: 123 456 789</p>
                </div>
            </div> <!-- /.header-information -->
        </div> <!-- /.container -->
	</header>

	<div class="main-menu">
        <div class="mobile-menu">
            <a href="#" class="mobile"><i class="fa fa-bars"> Menu</i></a>
        </div>
        
		<div class="navigation container">
			<?php 
				$args = array(
					'theme_location' => 'header-menu',
					'container' => 'nav',
					'container_class' => 'site-nav'
				);
				wp_nav_menu($args);
			?>
		</div>
	</div>
