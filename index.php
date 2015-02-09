<?php

	require_once '/vendor/autoload.php';

	///

	if(isset($_GET['page'])&&$_GET['page']==='response')
	{
		header('Content-Type: text/json; charset=utf8');
		extract($_POST);
		include 'src/controller/response.php';
		exit;
	}

	///

	$page = VIEWS . (isset($_GET['page'])&&!empty($_GET['page'])? $_GET['page']: 'index') . '.php';

	if(!file_exists($page)) $page = VIEWS . 'error.php';

	///

	if(!strpos($page,'config')&&empty(file_get_contents(JSON_CONFIGS))) header('Location: ' . BASE . 'config');

	///

	include TEMPLATES . 'template.php';