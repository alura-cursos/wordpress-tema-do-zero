<?php
$css_escolhido = 'page';
require_once('header.php');
?>

<main class="pagina-main">
	
	<article class="pagina">
		<h1 class="pagina-titulo">
			<?php the_title(); ?>
		</h1>

		<?php if( have_posts() ) {
			while( have_posts() ) {
				the_post(); ?>

			<div class="pagina-conteudo">
			 <?php the_content(); ?>
			</div>

		<?php	}
		} 

		if( is_page('contato') ) {
		?>

		<form>
			<div class="form-nome">
				<label for="form-nome">Nome:</label>
				<input id="form-nome" type="text" placeholder="Seu nome aqui" name="form-nome">
			</div>

			<div class="form-email">
				<label for="form-email">Email:</label>
				<input id="form-email" type="email" placeholder="email@exemplo.com.br" name="form-email">
			</div>
		
			<div class="form-mensagem">
				<label for="form-mensagem">Mensagem:</label>
				<textarea id="form-mensagem" name="form-mensagem"></textarea>
			</div>
			<button type="submit">Enviar</button>

		</form>

	<?php } ?>

	</article>
</main>

<?php get_footer(); ?>