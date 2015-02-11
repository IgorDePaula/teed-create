<?php

	header( 'Content-Type: text/html; charset=utf-8' );

	###

	\Helpers\Files::create_path( APP_DATA );

	###

	if( !method_exists( CONTROLLER_METHOD, CONTROLLER_FUNCTION ))
	{

		include VIEWS_PAGES . '404.php';

		exit();

	}

	###

	call_user_func( CONTROLLER_CLASS );