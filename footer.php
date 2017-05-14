		<footer class="footer">
            <?php 
                $args = array(
                    'theme_location' => 'header-menu',
                    'container' => 'nav',
                    'after' => '<span class="separator"> &#124; </span>'
                );
                wp_nav_menu($args);
            ?>
            
            <div class="location">
                <p>2343 Bay Avenue Mountain View, CA 90210</p>
                <p>Phone Number: 123 456 789</p>
				<p class="copyright">
					Created by Josip Susic &#124; &#169; <?php echo date('Y'); ?>
				</p>
            </div>

		</footer> <!--/.footer -->
		
		<?php wp_footer(); ?> <!-- load js file at the bottom -->
	</body>
</html>
