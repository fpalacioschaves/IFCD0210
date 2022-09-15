<?php get_header(); ?>

<!-- Banner -->
<section id="banner">
	<div class="content">
		<header>
			<h1>Hi, I’m Editorial<br />
				by HTML5 UP</h1>
			<p>A free and fully responsive site template</p>
		</header>
		<p>Aenean ornare velit lacus, ac varius enim ullamcorper eu. Proin aliquam facilisis ante interdum congue. Integer mollis, nisl amet convallis, porttitor magna ullamcorper, amet egestas mauris. Ut magna finibus nisi nec lacinia. Nam maximus erat id euismod egestas. Pellentesque sapien ac quam. Lorem ipsum dolor sit nullam.</p>
		<ul class="actions">
			<li><a href="#" class="button big">Learn More</a></li>
		</ul>
	</div>
	<span class="image object">
		<img src="<?php echo get_template_directory_uri(); ?>/images/pic10.jpg" alt="" />
	</span>
</section>

<!-- Fin del  Banner -->


<!-- Fin Section Iconos -->

<!-- Section Items -->
<section>
	<header class="major">
		<h2>Ipsum sed dolor</h2>
	</header>
	<div class="posts">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
		$contenido = get_the_content();
		$extracto = substr($contenido, 0, 200);
	?>
			<article>
				<a href="#" class="image">
					<?php the_post_thumbnail();?>
				</a>
				<h3><?php the_title();?></h3>
				<p><?php echo $extracto;?>...</p>
				<ul class="actions">
					<li><a href="<?php the_permalink();?>" class="button">Leer más</a></li>
				</ul>
			</article>
		<?php endwhile;

		else :
				echo '<p>There are no posts!</p>';

		endif;
		?>
		
	</div>
</section>
<!-- Fin Section Items -->

</div>
</div>

<!-- Sidebar -->
<?php include("aside.php");?>

</div>

<!-- Scripts -->
<?php wp_footer(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/browser.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/breakpoints.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/util.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>

</body>

</html>