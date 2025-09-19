<?php
return [
    'Users.Social.login' => false,
    //'OAuth.providers.facebook.options.clientId' => 'YOUR APP ID',
    //'OAuth.providers.facebook.options.clientSecret' => 'YOUR APP SECRET',
    //'OAuth.providers.twitter.options.clientId' => 'YOUR APP ID',
    //'OAuth.providers.twitter.options.clientSecret' => 'YOUR APP SECRET',
    //etc

	'Auth.Identifiers.Password.fields.username' => 'email',
	'Auth.Authenticators.Form.fields.username' => 'email',

    'Users' => [
        'table' => 'CakeDC/Users.Users',
		//'controller' => 'MyUsers',
		
        'Tos' => [
            'required' => true,
        ],
        'Registration' => [
            'active' => true,
		],
	],

	// https://discourse.cakephp.org/t/configure-logoutredirect-in-authentication-plugin-with-cakedc-users-in-cakephp-5-x/11766/7
	// https://github.com/CakeDC/users/issues/362
	
    'Auth' => [
        'AuthenticationComponent' => [
            'loginRedirect' => '/admin',
            'logoutRedirect' => '/',
        ],
		
    ],

];