<?php 

/*
* Template Name: Contact Us
*/

get_header(); ?>

	<?php while(have_posts()): the_post(); ?>

    <div class="hero" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>);">
        <div class="hero-content">
            <div class="hero-text">
                <h2><?php the_title(); ?></h2>
            </div>
        </div>
    </div> <!--/.hero -->

    <div class="main-content container clear reservation">
        <main class="content-text" id="gallery">
            <?php get_template_part('templates/reservation', 'form'); ?>
        </main> <!--/main -->
    </div> <!--/.main-content -->

    <?php endwhile; ?>

<?php get_footer(); ?>