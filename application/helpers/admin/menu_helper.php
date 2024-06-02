<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

function view_menu($arr, $parent_id = 0) {
	$CI = &get_instance();

	// Условия выхода из рекурсии
	if(empty($arr[$parent_id])) {
		return;
	}

	echo ($parent_id == 0) ? '<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">' : '<ul class="nav nav-treeview">';

	//перебираем в цикле массив и выводим на экран
	for ($i = 0; $i < count($arr[$parent_id]); $i++) {

		if (substr($arr[$parent_id][$i]->slug, 1) == $CI->uri->uri_string()) {
			$active = 'active';
		}
		else {
			$active = NULL;
		}

		$icon = $arr[$parent_id][$i]->icon ? $arr[$parent_id][$i]->icon : 'far fa-circle';
		
		if ($arr[$parent_id][$i]->parent_id != 0) {
			echo '<li class="nav-item">';
			echo '<a href="'.$arr[$parent_id][$i]->slug.'" class="nav-link '.$active.'"><i class="nav-icon '.$icon.'"></i><p>'.$arr[$parent_id][$i]->title.'</p></a>';
			// Рекурсия - проверяем нет ли дочерних категорий
			view_menu($arr, $arr[$parent_id][$i]->id);
			echo '</li>';
		}
		if ($arr[$parent_id][$i]->parent_id == 0 AND $arr[$parent_id][$i]->slug != '') {
			echo '<li class="nav-item">';
			echo '<a href="'.$arr[$parent_id][$i]->slug.'" class="nav-link '.$active.'"><i class="nav-icon '.$icon.'"></i><p>'.$arr[$parent_id][$i]->title.'</p></a>';
			// Рекурсия - проверяем нет ли дочерних категорий
			view_menu($arr, $arr[$parent_id][$i]->id);
			echo '</li>';
		}
		elseif ($arr[$parent_id][$i]->parent_id == 0) {		
			echo '<li class="nav-item">';
			echo '<a href="javascript:void(0);" class="nav-link"><i class="nav-icon '.$icon.'"></i><p>'.$arr[$parent_id][$i]->title.'<i class="right fas fa-angle-left"></i></p></a>';
			// Рекурсия - проверяем нет ли дочерних категорий
			view_menu($arr, $arr[$parent_id][$i]->id);
			echo '</li>';
		}
	}
	echo '</ul>';
}	