<?php

if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' => 'Контактные данные',
		'menu_title' => 'Контактные данные',
		'menu_slug' => 'opt-contacts',
	));

	//acf_add_options_page(array(
	//	'page_title' => 'Общие секции',
	//	'menu_title' => 'Общие секции',
	//	'menu_slug' => 'opt-sections',
	//));

	acf_add_options_page(array(
		'page_title' => 'Шапка',
		'menu_title' => 'Шапка',
		'menu_slug' => 'opt-header',
	));

	acf_add_options_page(array(
		'page_title' => 'Подвал / Футер',
		'menu_title' => 'Подвал / Футер',
		'menu_slug' => 'opt-footer',
	));

	acf_add_options_page(array(
		'page_title' => 'Модальные окна',
		'menu_title' => 'Модальные окна',
		'menu_slug' => 'opt-modals',
	));

	acf_add_options_page(array(
		'page_title' => 'Страница благодарности',
		'menu_title' => 'Страница благодарности',
		'menu_slug' => 'opt-thank_you',
	));

	acf_add_options_page(array(
		'page_title' => 'Страница 404',
		'menu_title' => 'Страница 404',
		'menu_slug' => 'opt-page-404',
	));

}

// OPTIONS
add_action('acf/init', function () {
	if (!function_exists('acf_add_local_field_group')) {
		return;
	}

	// HEADER
	acf_add_local_field_group(array(
		'key' => 'group_header_settings',
		'title' => 'Поля шапки',
		'fields' => array(
			array(
				'key' => 'field_header_info_message',
				'name' => 'header_info_message',
				'type' => 'message',
				'message' => '<b>Логотип</b> - перейдите в Панель управления сайтом > Основные настройки > Логотип сайта.<br/><b>Меню</b> - перейдите в Панель управления сайтом > Меню > Меню шапки.<br/><b>Контакты</b> - перейдите в Панель управления сайтом > Редактирование контента > Основные секции > Контактные данные.',
				'new_lines' => 'wpautop',
				'esc_html' => 0,
			),
			array(
				'key' => 'field_header_logo_big',
				'label' => 'Логотип (Десктоп)',
				'name' => 'header_logo_big',
				'type' => 'image',
			),
			// Логотип мобильный
			array(
				'key' => 'field_header_logo_small',
				'label' => 'Логотип (Планшет/Мобайл)',
				'name' => 'header_logo_small',
				'type' => 'image',
				'instructions' => 'Упрощённая версия логотипа для маленьких экранов.',
			),
			// Телефон
			array(
				'key' => 'field_header_phone',
				'label' => 'Телефон',
				'name' => 'header_phone',
				'type' => 'text',
			),
			// Подпись к телефону
			array(
				'key' => 'field_header_phone_label',
				'label' => 'Подпись к телефону',
				'name' => 'header_phone_label',
				'type' => 'text',
			),
			// Кнопка
			array(
				'key' => 'field_header_btn',
				'label' => 'Кнопка в шапке',
				'name' => 'header_btn',
				'type' => 'link',
				'instructions' => 'Ссылка на модальное окно (якорь #modal-call) или страницу.',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'opt-header',
				),
			),
		),
	));

	// FOOTER
	acf_add_local_field_group(array(
		'key' => 'flds_opt_footer',
		'title' => 'Поля футера',
		'fields' => array(
			array(
				'key' => 'footer_info_message',
				'name' => 'footer_info_message',
				'type' => 'message',
				'message' => '<b>Меню</b> - перейдите в Панель управления сайтом > Меню > Меню шапки / футера.<br/><b>Контакты</b> - перейдите в Панель управления сайтом > Редактирование контента > Основные секции > Контактные данные.',
				'new_lines' => 'wpautop',
				'esc_html' => 0,
			),
			array(
				'key' => 'footer_logo',
				'name' => 'footer_logo',
				'label' => 'Логотип',
				'type' => 'image',
			),
			array(
				'key' => 'footer_descr',
				'name' => 'footer_descr',
				'label' => 'Описание',
				'type' => 'textarea',
				'new_lines' => 'wpautop',
				'rows' => 2,
			),
			array(
				'key' => 'footer_copy',
				'name' => 'footer_copy',
				'label' => 'Копирайт / Название компании',
				'type' => 'text',
			),
			array(
				'key' => 'footer_year',
				'name' => 'footer_year',
				'label' => 'Основание компании',
				'type' => 'text',
			),
			array(
				'key' => 'footer_links',
				'name' => 'footer_links',
				'label' => 'Ссылки',
				'type' => 'repeater',
				'sub_fields' => array(
					array(
						'key' => 'footer_links_link',
						'name' => 'footer_links_link',
						'label' => 'Ссылка',
						'type' => 'link',
					),
				)
			)
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'opt-footer',
				),
			),
		),
	));

	// CONTACTS
	acf_add_local_field_group([
		'key' => 'group_contacts_options',
		'title' => 'Контакты и секция контактов',
		'fields' => [
			[
				'key' => 'field_contacts_tab_phones',
				'label' => 'Телефоны',
				'name' => '_tab_phones',
				'type' => 'tab',
			],
			[
				'key' => 'field_contacts_phones',
				'label' => 'Список телефонов',
				'name' => 'contacts_phones',
				'type' => 'repeater',
				'layout' => 'table',
				'sub_fields' => [
					[
						'key' => 'field_phone_label',
						'label' => 'Подпись',
						'name' => 'phone_label',
						'type' => 'text',
					],
					[
						'key' => 'field_phone_value',
						'label' => 'Номер',
						'name' => 'phone_value',
						'type' => 'text',
					],
				],
			],

			[
				'key' => 'field_contacts_tab_emails',
				'label' => 'Email',
				'name' => '_tab_emails',
				'type' => 'tab',
				'placement' => 'top',
			],
			[
				'key' => 'field_contacts_emails',
				'label' => 'Список Email',
				'name' => 'contacts_emails',
				'type' => 'repeater',
				'layout' => 'table',
				'sub_fields' => [
					[
						'key' => 'field_email_label',
						'label' => 'Подпись',
						'name' => 'email_label',
						'type' => 'text',
					],
					[
						'key' => 'field_email_value',
						'label' => 'Адрес почты',
						'name' => 'email_value',
						'type' => 'email',
					],
				],
			],

			[
				'key' => 'field_contacts_tab_address',
				'label' => 'Адрес',
				'name' => '_tab_address',
				'type' => 'tab',
				'placement' => 'top',
			],
			[
				'key' => 'field_contacts_address_title',
				'label' => 'Подпись над адресом',
				'name' => 'contacts_address_label',
				'type' => 'text',
			],
			[
				'key' => 'field_contacts_address',
				'label' => 'Адрес офиса',
				'name' => 'contacts_address',
				'type' => 'wysiwyg',
			],

			[
				'key' => 'field_contacts_tab_payment',
				'label' => 'Реквизиты',
				'name' => '_tab_payment',
				'type' => 'tab',
				'placement' => 'top',
			],
			[
				'key' => 'field_contacts_payment_title',
				'label' => 'Заголовок',
				'name' => 'contacts_payment_label',
				'type' => 'text',
			],
			[
				'key' => 'field_contacts_payment',
				'label' => 'Реквизиты',
				'name' => 'contacts_payment',
				'type' => 'wysiwyg',
			],

			[
				'key' => 'field_contacts_tab_section',
				'label' => 'Настройки секции',
				'name' => '_tab_section',
				'type' => 'tab',
				'placement' => 'top',
			],
			[
				'key' => 'field_contacts_title',
				'label' => 'Заголовок',
				'name' => 'contacts_section_title',
				'type' => 'text',
			],
			[
				'key' => 'field_contacts_descr',
				'label' => 'Описание',
				'name' => 'contacts_section_description',
				'type' => 'wysiwyg',
			],
			[
				'key' => 'field_contacts_form_title',
				'label' => 'Заголовок формы',
				'name' => 'contacts_form_title',
				'type' => 'text',
				'default_value' => 'Запросить условия поставки',
			],
			[
				'key' => 'field_contacts_form_shortcode',
				'label' => 'Шорткод формы',
				'name' => 'contacts_form_shortcode',
				'type' => 'text',
				'placeholder' => '[contact-form-7 id="123" title="Контакты"]',
			],
		],
		'location' => [
			[
				['param' => 'options_page', 'operator' => '==', 'value' => 'opt-contacts'],
			],
		],
	]);

	// MODALS
	acf_add_local_field_group(array(
		'key' => 'group_opt_modals',
		'title' => 'Глобальные модальные окна',
		'fields' => array(
			array(
				'key' => 'field_modals_list',
				'label' => 'Список модальных окон',
				'name' => 'modals',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_modal_id',
				'button_label' => 'Добавить модальное окно',
				'sub_fields' => array(
					array(
						'key' => 'field_modal_id',
						'label' => 'ID модального окна',
						'name' => 'id',
						'type' => 'text',
						'required' => 1,
						'maxlength' => 50,
						'instructions' => 'Только латиница, цифры, дефис. Пример: <code>order-form</code>. Используется в <code>id</code> и <code>data-modal</code>.',
						'prepend' => '#',
						'character_limit' => 50,
						'allow_custom' => 0,
					),
					array(
						'key' => 'field_modal_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text',
					),
					array(
						'key' => 'field_modal_descr',
						'label' => 'Описание',
						'name' => 'descr',
						'type' => 'wysiwyg',
					),
					array(
						'key' => 'field_modal_shortcode',
						'label' => 'Шорткод формы',
						'name' => 'shortcode',
						'type' => 'text',
						'placeholder' => '[contact-form-7 id="123"]',
						'instructions' => 'Вставьте шорткод форм (CF7, WPForms, Forminator и свой шорткод).',
					),
					array(
						'key' => 'field_modal_image',
						'label' => 'Фон',
						'name' => 'image',
						'type' => 'image',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'opt-modals',
				),
			),
		),
	));

	// THANK YOU
	acf_add_local_field_group(array(
		'key' => 'flds_opt_thank_you',
		'title' => 'Страница благодарности',
		'fields' => array(
			array(
				'key' => 'field_thank_you_title',
				'name' => 'thank_you_title',
				'label' => 'Заголовок',
				'type' => 'text',
			),
			array(
				'key' => 'field_thank_you_descr',
				'name' => 'thank_you_descr',
				'label' => 'Описание',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_thank_you_btn',
				'name' => 'thank_you_btn',
				'label' => 'Кнопка',
				'type' => 'link',
			),
			array(
				'key' => 'field_thank_you_image',
				'name' => 'thank_you_image',
				'label' => 'Картинка',
				'type' => 'image',
			)
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'opt-thank_you',
				),
			),
		),
	));

	// PAGE 404 
	acf_add_local_field_group(array(
		'key' => 'flds_opt_page_404',
		'title' => 'Страница благодарности',
		'fields' => array(
			array(
				'key' => 'field_page_404_title',
				'name' => 'page_404_title',
				'label' => 'Заголовок',
				'type' => 'text',
			),
			array(
				'key' => 'field_page_404_descr',
				'name' => 'page_404_descr',
				'label' => 'Описание',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_page_404_btn',
				'name' => 'page_404_btn',
				'label' => 'Кнопка',
				'type' => 'link',
			),
			array(
				'key' => 'field_page_404_image',
				'name' => 'page_404_image',
				'label' => 'Картинка',
				'type' => 'image',
			),
			array(
				'key' => 'field_page_404_image_404',
				'name' => 'page_404_image_404',
				'label' => 'Картинка c цифрой 404',
				'type' => 'image',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'opt-page-404',
				),
			),
		),
	));

	// SECTIONS
});


add_action('acf/init', 'register_fields');
function register_fields()
{
	//! === HOME PAGE
	// hero
	acf_add_local_field_group(array(
		'key' => 'group_hero_front_page',
		'title' => 'Первый экран',
		'fields' => array(
			// Заголовок
			array(
				'key' => 'field_hero_title',
				'label' => 'Заголовок',
				'name' => 'hero_title',
				'type' => 'text',
			),
			// Описание
			array(
				'key' => 'field_hero_description',
				'label' => 'Описание',
				'name' => 'hero_description',
				'type' => 'wysiwyg',
			),
			// Кнопка
			array(
				'key' => 'field_hero_btn',
				'label' => 'Кнопка',
				'name' => 'hero_btn',
				'type' => 'link',
				'instructions' => 'Ссылка на якорь (#contacts), модальное окно или страницу.',
			),
			// Фоновое изображение десктоп
			array(
				'key' => 'field_hero_bg_big',
				'label' => 'Фон (Десктоп)',
				'name' => 'hero_bg_big',
				'type' => 'image',
			),
			// Фоновое изображение мобильное
			array(
				'key' => 'field_hero_bg_small',
				'label' => 'Фон (Мобайл)',
				'name' => 'hero_bg_small',
				'type' => 'image',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'front-page.php',
				),
			),
		),
		'menu_order' => 1,
	));

	// about
	acf_add_local_field_group(array(
		'key' => 'group_about_section',
		'title' => 'Секция: О компании',
		'fields' => array(
			// Заголовок
			array(
				'key' => 'field_about_title',
				'label' => 'Заголовок секции',
				'name' => 'about_title',
				'type' => 'text',
			),
			// Описание
			array(
				'key' => 'field_about_description',
				'label' => 'Описание секции',
				'name' => 'about_description',
				'type' => 'wysiwyg',
			),
			// Список преимуществ
			array(
				'key' => 'field_about_items',
				'label' => 'Блоки / Преимущества',
				'name' => 'about_items',
				'type' => 'repeater',
				'layout' => 'block',
				'button_label' => 'Добавить блок',
				'sub_fields' => array(
					array(
						'key' => 'field_about_item_icon',
						'label' => 'Иконка',
						'name' => 'icon',
						'type' => 'image',
					),
					array(
						'key' => 'field_about_item_title',
						'label' => 'Заголовок блока',
						'name' => 'title',
						'type' => 'text',
					),
					array(
						'key' => 'field_about_item_description',
						'label' => 'Описание блока',
						'name' => 'description',
						'type' => 'textarea',
						'rows' => 3,
						'new_lines' => 'wpautop',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'front-page.php',
				),
			),
		),
		'menu_order' => 2,
	));
	// products
	acf_add_local_field_group([
		'key' => 'group_products_options',
		'title' => 'Секция "Продукция"',
		'fields' => [
			[
				'key' => 'field_prod_sec_title',
				'label' => 'Заголовок секции',
				'name' => 'products_section_title',
				'type' => 'text',
			],
			[
				'key' => 'field_prod_sec_descr',
				'label' => 'Описание секции',
				'name' => 'products_section_description',
				'type' => 'wysiwyg',
			],
			[
				'key' => 'field_prod_note_title',
				'label' => 'Заголовок блока "Не нашли?"',
				'name' => 'products_note_title',
				'type' => 'text',
			],
			[
				'key' => 'field_prod_note_descr',
				'label' => 'Описание блока "Не нашли?"',
				'name' => 'products_note_description',
				'type' => 'wysiwyg',
			],
			[
				'key' => 'field_prod_note_btn',
				'label' => 'Кнопка CTA',
				'name' => 'products_note_btn',
				'type' => 'link',
			],
		],
		'location' => [
			[
				['param' => 'page_template', 'operator' => '==', 'value' => 'front-page.php'],
			],
		],
		'menu_order' => 3,
	]);

	// CPT product
	acf_add_local_field_group([
		'key' => 'group_product_fields',
		'title' => 'Настройки продукта',
		'fields' => [
			[
				'key' => 'field_product_packaging',
				'label' => 'Формат упаковки',
				'name' => 'product_packaging',
				'type' => 'text',
				'placeholder' => 'пакет / сетка / флоупак',
			],
		],
		'location' => [
			[
				['param' => 'post_type', 'operator' => '==', 'value' => 'product'],
			],
		],
		'menu_order' => 1,
	]);

	// process
	acf_add_local_field_group(array(
		'key' => 'group_process_section',
		'title' => 'Секция: Процесс',
		'fields' => array(
			// Заголовок
			array(
				'key' => 'field_process_title',
				'label' => 'Заголовок секции',
				'name' => 'process_title',
				'type' => 'text',
			),
			// Описание
			array(
				'key' => 'field_process_descr',
				'label' => 'Описание секции',
				'name' => 'process_descr',
				'type' => 'wysiwyg',
			),
			// Список этапов (для слайдера)
			array(
				'key' => 'field_process_list',
				'label' => 'Этапы процесса',
				'name' => 'process_list',
				'type' => 'repeater',
				'min' => 1,
				'max' => 10,
				'layout' => 'block',
				'button_label' => 'Добавить этап',
				'sub_fields' => array(
					array(
						'key' => 'field_process_item_title',
						'label' => 'Заголовок этапа',
						'name' => 'title',
						'type' => 'text',
					),
					array(
						'key' => 'field_process_item_header_descr',
						'label' => 'Описание этапа',
						'name' => 'descr',
						'type' => 'textarea',
						'new_lines' => 'wpautop',
						'rows' => 3,
					),
				),
			),
			// Галерея
			array(
				'key' => 'field_process_gallery',
				'label' => 'Галерея процесса',
				'name' => 'process_gallery',
				'type' => 'gallery',
				'sub_fields' => array(
					array(
						'key' => 'field_process_gallery_image',
						'label' => 'Изображение',
						'name' => 'image',
						'type' => 'image',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'front-page.php',
				),
			),
		),
		'menu_order' => 4,
	));
	//benefits
	acf_add_local_field_group([
		'key' => 'group_benefits_options',
		'title' => 'Секция "Преимущества"',
		'fields' => [
			[
				'key' => 'field_benefits_sec_title',
				'label' => 'Заголовок секции',
				'name' => 'benefits_section_title',
				'type' => 'text',
				'default_value' => 'Наши преимущества',
			],
			[
				'key' => 'field_benefits_list',
				'label' => 'Список преимуществ',
				'name' => 'benefits_list',
				'type' => 'repeater',
				'layout' => 'block',
				'sub_fields' => [
					[
						'key' => 'field_benefit_icon',
						'label' => 'Иконка',
						'name' => 'benefit_icon',
						'type' => 'image',
					],
					[
						'key' => 'field_benefit_title',
						'label' => 'Заголовок',
						'name' => 'benefit_title',
						'type' => 'text',
					],
					[
						'key' => 'field_benefit_descr',
						'label' => 'Описание',
						'name' => 'benefit_description',
						'type' => 'textarea',
						'new_lines' => 'wpautop',
						'rows' => 3,
					],
				],
			],
		],
		'location' => [
			[['param' => 'page_template', 'operator' => '==', 'value' => 'front-page.php']],
		],
		'menu_order' => 5,
	]);
	// clients
	acf_add_local_field_group([
		'key' => 'group_clients_options',
		'title' => 'Секция "Клиенты"',
		'fields' => [
			[
				'key' => 'field_clients_sec_title',
				'label' => 'Заголовок секции',
				'name' => 'clients_section_title',
				'type' => 'text',
			],
			[
				'key' => 'field_clients_sec_descr',
				'label' => 'Описание секции',
				'name' => 'clients_section_description',
				'type' => 'wysiwyg',
			],
			[
				'key' => 'field_clients_logos',
				'label' => 'Логотипы клиентов',
				'name' => 'clients_logos',
				'type' => 'gallery',
			],
		],
		'location' => [
			[['param' => 'page_template', 'operator' => '==', 'value' => 'front-page.php']],
		],
		'menu_order' => 6,
	]);
}
