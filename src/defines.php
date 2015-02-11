<?php

	define( 'WINDIR', explode( '/', $_SERVER['DOCUMENT_ROOT'] )[0] . '/' );

	define( 'PROJECT_FOLDER', str_replace( '\\', '/', dirname( dirname( __DIR__ ) ) ) . '/' );

	define( 'VERSION', '0.2.0' );

	define( 'APP_DATA', WINDIR . 'Teed Create/' );

	###

	define( 'BASE', './' );

	define( 'SRC', BASE . 'src/' );

	define( 'CONTROLLER', SRC . 'Controller/' );

	define( 'HELPERS', SRC . 'Helpers/' );

	define( 'VIEWS', SRC . 'views/' );

		define( 'VIEWS_TEMPLATES', VIEWS . 'templates/' );

		define( 'VIEWS_PAGES', VIEWS . 'pages/' );

	define( 'WWW', SRC . 'www/' );

	###

	define( 'METHOD', strtolower( $_SERVER['REQUEST_METHOD'] ) );

		define( 'CONTROLLER_NAME', isset( $_GET['url'] ) ? ucfirst( current( explode( '/', $_GET['url'] ) ) ) :'Home' );

		###

		$function = isset( $_GET['url'] ) ? str_replace( '/', '_', $_GET['url'] ): 'home';

		if( !isset( explode( '_', $function )[1] ) ) $function = 'home';
		else $function = explode( '_', $function )[1];

		define( 'CONTROLLER_FUNCTION', METHOD .'_'. $function );

		define( 'CONTROLLER_METHOD', 'Controller\\' . CONTROLLER_NAME );

		define( 'CONTROLLER_CLASS', CONTROLLER_METHOD .'::'. CONTROLLER_FUNCTION );

	###