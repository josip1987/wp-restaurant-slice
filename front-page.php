<?php get_header(); ?>

	<?php while(have_posts()): the_post(); ?>

    <div class="hero" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>);">
        <div class="hero-content">
            <div class="hero-text">
                <h2><?php echo esc_html( get_option('blogdescription') ); ?></h2>
                <?php the_content(); ?>
                <?php $url = get_page_by_title('About Us'); ?>
                <a class="button secondary" href="<?php echo get_permalink($url->ID); ?>">more info</a>
            </div>
        </div>
    </div> <!--/.hero -->
    <?php endwhile; ?>

    <div class="main-content container clear">
        <main class="container-grid clear" id="gallery">
             <h2 class="primary-text text-center">Special Services</h2>
             <?php $args = array(
                'posts_per_page' => 3,
                'post_type' => 'specialties',
                'category_name' => 'pizzas',
                'orderby' => 'rand' // temporary, change if there are many visits
             ); 
             $specialties = new WP_Query($args);
             while($specialties->have_posts()): $specialties->the_post(); ?>
            
             <div class="specialty columns1-3">
                 <div class="specialty-content">
                     <?php the_post_thumbnail('portrait'); ?>
                     <div class="information">
                         <?php the_title('<h3>', '</h3>'); ?>
                         <?php the_content(); ?>
                         <p class="price">&#8364;<?php the_field('price'); ?></p>
                         <a href="<?php the_permalink(); ?>" class="button secondary">read more</a>
                     </div>
                 </div>
             </div>
            
             <?php endwhile; wp_reset_postdata(); ?>
        </main>
    </div> <!--/.main-content -->

    <section class="ingredients clear">
        <div class="container">
            <div class="container-grid">
                <?php while(have_posts()): the_post(); ?>
                    <div class="columns2-4">
                        <h3><?php the_field('description'); ?></h3>
                        <?php the_field('description_text'); ?>
                        <?php $url = get_page_by_title('About Us'); ?>
                        <a class="button secondary" href="<?php echo get_permalink($url->ID); ?>">read more</a>
                    </div>
                    <div class="columns2-4 image">
                        <img src="<?php the_field('add_image'); ?>" alt="Product image">
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section> <!--/section -->

    <section class="container clear">
        <h2 class="primary-text text-center">Gallery</h2>
        <?php
            $url = get_page_by_title('Gallery');
            echo get_post_gallery($url->ID);
        ?>
    </section> <!--/section -->

    <section class="location-reservation container clear">
        <div class="container-grid">
            <div class="columns2-4">
                <div id="map">
                    map here
                </div>
            </div>
            <div class="columns2-4">
                <?php get_template_part('templates/reservation', 'form'); ?>
            </div>
        </div>
    </section> <!--/section -->

    
<?php get_footer(); ?>









