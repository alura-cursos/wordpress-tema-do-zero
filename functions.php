<?php

add_theme_support( 'post-thumbnails' );

function registrar_imoveis() {
	$descricao = 'Usado para listar os imóveis da Maluras';
	$singular = 'Imóvel';
	$plural = 'Imóveis';

	$labels = array(
		'name' => $plural,
		'singular_name' => $singular,
		'view_item' => 'Ver ' . $singular,
		'edit_item' => 'Editar ' . $singular,
		'new_item' => 'Novo ' . $singular,
		'add_new_item' => 'Adicionar novo ' . $singular
	);

	$supports = array(
		'title',
		'editor',
		'thumbnail'
	);

	$args = array(
		'labels' => $labels,
		'description' => $descricao,
		'public' => true,
		'menu_icon' => 'dashicons-admin-home',
		'supports' => $supports
	);


	register_post_type( 'imovel', $args);	
}

add_action('init', 'registrar_imoveis');

/* Registrando menu de navegação */

function registrar_menu_navegacao() {
	register_nav_menu('header-menu', 'Menu Header');
}

add_action( 'init', 'registrar_menu_navegacao');

function get_titulo() {
	if( is_home() ) {
		bloginfo('name');
	} else {
		bloginfo('name');
		echo ' | ';
		the_title();
	}
}

/* Criando a taxonomia de localização */

function criando_taxonomia_localizacao() {
	$singular = 'Localização';
	$plural = 'Localizações';

	$labels = array(
		'name' => $plural,
		'singular_name' => $singular,
		'view_item' => 'Ver ' . $singular,
		'edit_item' => 'Editar ' . $singular,
		'new_item' => 'Novo ' . $singular,
		'add_new_item' => 'Adicionar novo ' . $singular
		);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'hierarchical' => true
		);

	register_taxonomy('localizacao', 'imovel', $args);
}

add_action( 'init' , 'criando_taxonomia_localizacao' );

function is_selected_taxonomy($taxonomy, $search) {
	if($taxonomy->slug === $search) {
		echo 'selected';
	}
}
