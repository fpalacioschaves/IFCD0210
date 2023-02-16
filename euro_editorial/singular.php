	<?php get_header(); ?>

	<!-- Content -->
	<section>
		<?php

			if ( have_posts() ) :
					while ( have_posts() ) : the_post(); ?>
						<header class="main">
							<h1><?php the_title();?></h1>
						</header>

						<?php the_content();?>
					<?php endwhile;

			else :
					echo '<p>There are no posts!</p>';

			endif;

		?>

	</section>

	</div>
	</div>

	<!-- Sidebar -->
	<?php include("aside.php"); ?>

	</div>

	<!-- Scripts -->
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/browser.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/breakpoints.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/util.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>
	<?php wp_footer(); ?>

	</body>

	</html>