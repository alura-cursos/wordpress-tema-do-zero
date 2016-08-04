<?php get_header(); ?>
<main class="home-main">
	<div class="container">

		<?php if( have_posts() ) { ?>
			<ul class="imoveis-listagem">
			<?php while( have_posts() ) {
					the_post(); ?>

				<li class="imoveis-listagem-item">
					<?php the_post_thumbnail(); ?>

					<h2><?php the_title(); ?></h2>

					<p><?php the_content(); ?></p>
				</li>

			<?php } ?>
			</ul>
		<?php	} ?>
	</div>
</main>


<?php get_footer(); ?>