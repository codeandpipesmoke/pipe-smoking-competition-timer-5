<?php
return [
	'Theme' => [
		'admin' => [
			'sidebar' => [
				'title' => 'JeffAdmin5',
				
			],
			'sidebarMenu' => [
				'Admin' => [
					[
						'type' 		=> 'menu',
						'icon' 		=> 'fa fa-fw fa-bars',
						'title'		=> __('Competitions'),
						'controller'=> 'Competitions',
						'action' 	=> 'index',
					],
					[
						'type' 		=> 'menu',
						'icon' 		=> 'fa fa-fw fa-bars',
						'title'		=> __('Clubs'),
						'controller'=> 'Clubs',
						'action' 	=> 'index',
					],
					[
						'type' 		=> 'menu',
						'icon' 		=> 'fa fa-fw fa-bars',
						'title'		=> __('Teams'),
						'controller'=> 'Teams',
						'action' 	=> 'index',
					],
					[
						'type' 		=> 'menu',
						'icon' 		=> 'fa fa-fw fa-bars',
						'title'		=> __('Tables'),
						'controller'=> 'Tables',
						'action' 	=> 'index',
					],
					[
						'type' 		=> 'menu',
						'icon' 		=> 'fa fa-fw fa-bars',
						'title'		=> __('Countries'),
						'controller'=> 'Countries',
						'action' 	=> 'index',
					],

					[
						'type' 		=> 'menu',
						'icon' 		=> 'fa fa-fw fa-bars',
						'title'		=> __('Languages'),
						'controller'=> 'Langs',
						'action' 	=> 'index',
					],



					/*
					[
						'type' 		=> 'menu',
						'icon' 		=> 'fa fa-fw fa-bars',
						'title'		=> __('Items'),
						'controller'=> 'Items',
						'action' 	=> 'index',
					],
					[
						'type' 		=> 'menu',
						'icon' 		=> 'fa fa-fw fa-bars',
						'title'		=> __('Itemgroups'),
						'controller'=> 'Itemgroups',
						'action' 	=> 'index',
					],
					[
						'type' 		=> 'submenu',
						'title'		=> __('Tables'),
						'icon'		=> 'fa fa-fw fa-table',
						'items'		=> [
							[
								'title' 		=> __('Posts'),
								'controller' 	=> 'Posts',
								'action' 		=> 'index',								
							],
							[
								'title' 		=> __('Categories'),
								'controller' 	=> 'Categories',
								'action' 		=> 'index',								
							],
						]
					],
					*/
				],				
			]		
		]	
	],

];

?>
