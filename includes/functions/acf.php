<?php
if (function_exists('acf_add_options_page')) {
	acf_add_options_page([
		'page_title' => 'Fale Conosco',
		'menu_title' => 'Meu Contato',
		'menu_slug' => 'configuracoes-de-contato',
		'capability' => 'edit_posts',
		'redirect' => false,
	]);
}

if (function_exists('acf_add_local_field_group')):
	acf_add_local_field_group([
		'key' => 'group_5f4e2b8c1a2b3',
		'title' => 'Configurações de Contato',
		'fields' => [
			[
				'key' => 'field_5f4e2b8c1a2b4',
				'label' => 'Telefone',
				'name' => 'telefone',
				'type' => 'text',
				'instructions' => 'Insira o número de telefone para contato.',
			],
			[
				'key' => 'field_5f4e2b8c1a2b5',
				'label' => 'Email',
				'name' => 'email',
				'type' => 'email',
				'instructions' => 'Insira o endereço de email para contato.',
			],
			[
				'key' => 'field_5f4e2b8c1a2b6',
				'label' => 'Endereço',
				'name' => 'endereco',
				'type' => 'textarea',
				'instructions' => 'Insira o endereço completo.',
			],
			[
				'key' => 'field_5f4e2b8c1a2b6',
				'label' => 'Instagram',
				'name' => 'instagram',
				'type' => 'text',
				'instructions' => 'Insira o link do Instagram.',
			],
		],
		'location' => [
			[
				[
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'configuracoes-de-contato',
				],
			],
		],
	]);

	acf_add_local_field_group([
		'key' => 'group_banners_hero',
		'title' => 'Banners Hero',
		'fields' => [
			[
				'key' => 'field_banners_repeater',
				'label' => 'Banners',
				'name' => 'banners',
				'type' => 'repeater',
				'button_label' => 'Adicionar Banner',
				'sub_fields' => [
					[
						'key' => 'field_banner_image',
						'label' => 'Imagem',
						'name' => 'imagem',
						'type' => 'group',
						'layout' => 'row',
						'sub_fields' => [
							[
								'key' => 'field_banner_image_desktop',
								'label' => 'Desktop',
								'name' => 'desktop',
								'type' => 'image',
								'return_format' => 'array',
								'preview_size' => 'medium',
								'library' => 'all',
							],
							[
								'key' => 'field_banner_image_mobile',
								'label' => 'Mobile',
								'name' => 'mobile',
								'type' => 'image',
								'return_format' => 'array',
								'preview_size' => 'medium',
								'library' => 'all',
							],
						],
					],
					[
						'key' => 'field_banner_link',
						'label' => 'Link',
						'name' => 'link',
						'type' => 'link',
						'return_format' => 'array',
					],
				],
			],
		],
		'location' => [
			[
				[
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-homepage.php',
				],
			],
		],
	]);

	acf_add_local_field_group([
		'key' => 'group_introducao_homepage',
		'title' => 'Introdução',
		'fields' => [
			[
				'key' => 'field_banner_image',
				'label' => 'Imagem',
				'name' => 'imagem',
				'type' => 'group',
				'layout' => 'row',
				'sub_fields' => [
					[
						'key' => 'field_banner_image_desktop',
						'label' => 'Desktop',
						'name' => 'desktop',
						'type' => 'image',
						'return_format' => 'array',
						'preview_size' => 'medium',
						'library' => 'all',
					],
					[
						'key' => 'field_banner_image_mobile',
						'label' => 'Mobile',
						'name' => 'mobile',
						'type' => 'image',
						'return_format' => 'array',
						'preview_size' => 'medium',
						'library' => 'all',
					],
				],
			],
			[
				'key' => 'field_descricao',
				'label' => 'Descrição',
				'name' => 'descricao',
				'type' => 'wysiwyg',
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => 1,
			],
			[
				'key' => 'field_topicos',
				'label' => 'Tópicos',
				'name' => 'topicos',
				'type' => 'repeater',
				'layout' => 'row',
				'button_label' => 'Adicionar Tópico',
				'sub_fields' => [
					[
						'key' => 'field_topico_titulo',
						'label' => 'Título',
						'name' => 'titulo',
						'type' => 'text',
					],
					[
						'key' => 'field_topico_descricao',
						'label' => 'Descrição',
						'name' => 'descricao',
						'type' => 'textarea',
						'rows' => 3,
					],
				],
			],
		],
		'location' => [
			[
				[
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-homepage.php',
				],
			],
		],
	]);

	acf_add_local_field_group([
		'key' => 'group_conta_digital_soma_mais',
		'title' => 'Conta Digital Soma Mais',
		'fields' => [
			[
				'key' => 'field_titulo_acessibilidade',
				'label' => 'Título (acessibilidade)',
				'name' => 'conta_titulo_acessibilidade',
				'type' => 'text',
				'instructions' => 'Esse título será usado apenas por leitores de tela (não será exibido visualmente).',
				'wrapper' => [
					'width' => '100',
				],
			],
			[
				'key' => 'field_imagem_conta',
				'label' => 'Imagem Principal',
				'name' => 'conta_imagem',
				'type' => 'image',
				'return_format' => 'array',
				'preview_size' => 'medium',
				'library' => 'all',
			],
			[
				'key' => 'field_topicos_conta',
				'label' => 'Tópicos',
				'name' => 'conta_topicos',
				'type' => 'repeater',
				'button_label' => 'Adicionar Tópico',
				'sub_fields' => [
					[
						'key' => 'field_topico_titulo_conta',
						'label' => 'Título do Tópico',
						'name' => 'titulo',
						'type' => 'text',
					],
					[
						'key' => 'field_topico_desc_conta',
						'label' => 'Descrição do Tópico',
						'name' => 'descricao',
						'type' => 'wysiwyg',
						'tabs' => 'all',
						'toolbar' => 'basic',
						'media_upload' => 0,
					],
				],
			],
		],
		'location' => [
			[
				[
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-homepage.php',
				],
			],
		],
		'menu_order' => 2,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
	]);
endif;
