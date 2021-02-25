<?php 
// правильный способ подключить стили и скрипты
add_action( 'wp_enqueue_scripts', 'flowers_scripts' );
function flowers_scripts() {
    // Connect style.css from theme
	wp_enqueue_style('style', get_stylesheet_uri() );

    // Connect bootstrap grid css
    wp_enqueue_style('bootstrap-grid', get_template_directory_uri() . '/css/bootstrap-grid.min.css');

    // Connect Swiper CSS
    wp_enqueue_style('swiper', 'https://unpkg.com/swiper/swiper-bundle.min.css');

    // Connect Fancy Box CSS
    wp_enqueue_style('fancybox', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css');
    
    // Add our main CSS
    wp_enqueue_style('flowers', get_template_directory_uri() . '/css/style.css');

    // Add scripts

    wp_deregister_script( 'jquery-core' );
	wp_register_script( 'jquery-core', '//cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js');
	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'swiper', '//unpkg.com/swiper/swiper-bundle.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'fancybox', '//cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array('fancybox'), '1.0.0', true );
}


add_theme_support( 'post-thumbnails' ); // Add thumbnail to review

// Add review field to admin menu

add_action('init', 'flowers_init');
function flowers_init(){
	register_post_type('reviews', array(
		'labels'             => array(
			'name'               => 'Отзывы', // Основное название типа записи
			'singular_name'      => 'Отзывы', // отдельное название записи типа Book
			'add_new'            => 'Добавить новый',
			'add_new_item'       => 'Добавить новый отзыв',
			'edit_item'          => 'Редактировать отзыв',
			'new_item'           => 'Новый отзыв',
			'view_item'          => 'Посмотреть отзыв',
			'search_items'       => 'Найти отзыв',
			'not_found'          => 'Книг не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Отзывы'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-welcome-view-site',
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title','editor','author','thumbnail','excerpt')
	) );
}