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

    <div class="main-content container clear">
        <main class="text-center content-text" id="gallery">
             
        </main>
    </div> <!--/.main-content -->

    <?php endwhile; ?>

<?php get_footer(); ?>