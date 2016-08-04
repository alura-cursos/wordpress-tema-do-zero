<?php
	$queryTaxonomy = array_key_exists('taxonomy', $_GET);
	if( $queryTaxonomy && $_GET['taxonomy'] == '') {
		wp_redirect( home_url() );
		exit;
	}

	$css_escolhido = 'index';
	require_once('header.php');
?>

<main class="home-main">
	<div class="container">

		<?php $taxonomies = get_terms('localizacao'); ?>
		<form class="busca-localizacao-form" action="<?php bloginfo('url'); ?>/" method="get">
			<div class="taxonomy-select-wrapper">
				<select name="taxonomy">
					<option value="">Todas as localizações</option>
					<?php foreach($taxonomies as $taxonomy) { ?>
					<option value="<?= $taxonomy->slug; ?>"><?= $taxonomy->name; ?></option>
					<?php } ?>
				</select>
			</div>
			<button type="submit">Filtrar</button>
		</form>


		<?php 

			if( $queryTaxonomy ) {
				$taxonomy_args = array(
					array(
						'taxonomy' => 'localizacao',
						'field' => 'slug',
						'terms' => $_GET['taxonomy']
					)
				);
			}

			$args = array(
				'post_type' => 'imovel',
				'tax_query' => $taxonomy_args
			);

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