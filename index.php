<?php get_header(); ?>
<main class="home-main">
	<div class="container">

		<?php 
			$args = array( 'post_type' => 'imovel' );
			$loop = new WP_Query( $args );
			if( $loop->have_posts() ) { ?>
			<ul class="imoveis-listagem">
			<?php while( $loop->have_posts() ) {
					$loop->the_post(); ?>

				<li class="imoveis-listagem-item">
					<a href="<?= the_permalink(); ?>">
						<?php the_post_thumbnail(); ?>

						<h2><?php the_title(); ?></h2>

						<p><?php the_content(); ?></p>
					</a>
				</li>

			<?php } ?>
			</ul>
		<?php	} ?>
	</div>
</main>


<?php get_footer(); ?>