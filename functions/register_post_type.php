<?php
add_action('init', function () {
	register_taxonomy('product_cat', 'product', [
		'labels' => [
			'name' => 'Категории продуктов',
			'singular_name' => 'Категория',
			'search_items' => 'Найти категории',
			'all_items' => 'Все категории',
			'parent_item' => 'Родительская категория',
			'edit_item' => 'Редактировать категорию',
			'update_item' => 'Обновить категорию',
			'add_new_item' => 'Добавить новую категорию',
			'new_item_name' => 'Название новой категории',
		],
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
		'rewrite' => ['slug' => 'product/category'],
	]);

	register_taxonomy('product_tag', 'product', [
		'labels' => [
			'name' => 'Метки продуктов',
			'singular_name' => 'Метка',
			'search_items' => 'Найти метки',
			'all_items' => 'Все метки',
			'edit_item' => 'Редактировать метку',
			'update_item' => 'Обновить метку',
			'add_new_item' => 'Добавить новую метку',
			'new_item_name' => 'Название новой метки',
		],
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
		'rewrite' => ['slug' => 'product/tag'],
	]);

	// 3️⃣ Сам тип записи "Продукт"
	register_post_type('product', [
		'labels' => [
			'name' => 'Продукты',
			'singular_name' => 'Продукт',
			'add_new' => 'Добавить продукт',
			'add_new_item' => 'Добавить новый продукт',
			'edit_item' => 'Редактировать продукт',
			'new_item' => 'Новый продукт',
			'view_item' => 'Просмотр продукта',
			'search_items' => 'Найти продукты',
			'not_found' => 'Продукты не найдены',
			'not_found_in_trash' => 'В корзине продукты не найдены',
			'all_items' => 'Все продукты',
		],
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => ['slug' => 'product'],
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 20,
		'menu_icon' => 'dashicons-carrot',
		'show_in_rest' => true,
		'supports' => ['title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes'],
	]);

});
