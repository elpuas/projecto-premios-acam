<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Premios Acam
 */

namespace acam\inc;

/**
 * Change dashboard Posts to News
 *
 * @author Alfredo Navas <elpuas@gmail.com>
 * @return void
 */
function change_post_object() {
	$get_post_type = get_post_type_object('post');
	$labels = $get_post_type->labels;
	$labels->name = 'Discos/EP';
	$labels->singular_name = 'Discos/EP';
	$labels->add_new = 'Agregar Discos/EP';
	$labels->add_new_item = 'Agregar Disco/EP';
	$labels->edit_item = 'Editar Disco/EP';
	$labels->new_item = 'Discos/EP';
	$labels->view_item = 'Ver Discos/EP';
	$labels->search_items = 'Buscar Discos/EP';
	$labels->not_found = 'No Se Encontraron Discos/EP';
	$labels->not_found_in_trash = 'No se encontraron Discos/EP en el Basurero';
	$labels->all_items = 'Todas las Discos/EP';
	$labels->menu_name = 'Discos/EP';
	$labels->name_admin_bar = 'Discos/EP';
}

add_action( 'init', __NAMESPACE__ . '\change_post_object' );