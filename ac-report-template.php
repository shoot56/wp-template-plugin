<?php 
/**
 * Plugin Name: Report Template
 * Description: Report Template plugin from anne&co to the theme.
 * Plugin URI: https://anneandco.ie/
 * Version: 1.1.0
 * Author: Shutko Dmitry
 */

function my_template_array() {
	$temps = [];

	$temps['report-template.php'] = 'Report Template';

	return $temps;
}



function my_template_register($page_templates,$theme,$post) {
	
	$templates = my_template_array();

	foreach ($templates as $tk => $tv) {
		$page_templates[$tk] = $tv;
	}

	return $page_templates;
}

add_filter('theme_page_templates', 'my_template_register', 10, 3);




function my_template_select( $template ){
	global $post,$wp_query,$wpdb;

	$page_temp_slug = get_page_template_slug($post->ID);

	$templates = my_template_array();

	if (isset($templates[$page_temp_slug])) {
		$template = plugin_dir_path(__FILE__).'/templates/'.$page_temp_slug;

		wp_enqueue_style('report-fancybox');
		wp_enqueue_style('report-aos');
		wp_enqueue_style('report-style');

		wp_enqueue_script('report-fancybox');
		wp_enqueue_script('report-script');
	}

	return $template;
}
add_filter('template_include', 'my_template_select', 99);

// remove theme styles
function remove_unnecessary_styles($template) {
	global $post,$wp_query,$wpdb;
	$page_temp_slug = get_page_template_slug($post->ID);
	$templates = my_template_array();
	if (isset($templates[$page_temp_slug])) {
		wp_dequeue_style( 'tuath_housing-style' );
		wp_deregister_style( 'tuath_housing-style' );

		remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
		remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
	}
}
add_action( 'wp_print_styles', 'remove_unnecessary_styles' );



function ac_report_enqueue_style() {
    wp_register_style( 'report-fancybox',  plugin_dir_url( __FILE__ ) . 'assets/css/fancybox.css' );
    wp_register_style( 'report-aos', 'https://unpkg.com/aos@next/dist/aos.css' );
    wp_register_style( 'report-style',  plugin_dir_url( __FILE__ ) . 'assets/css/style.css' );
    wp_register_script( 'report-fancybox', plugin_dir_url( __FILE__ ) . 'assets/js/fancybox.min.js', array(), '', true );
	wp_register_script( 'report-script', plugin_dir_url( __FILE__ ) . 'assets/js/jquery.main.js', array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'ac_report_enqueue_style' );



require plugin_dir_path(__FILE__).'/inc/fields.php';

 ?>