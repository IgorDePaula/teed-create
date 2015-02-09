<?php

	if(!isset($action)) return;

	///

	$host = new \Helpers\Hosts;

	switch($action)
	{
		case 'getProjects':

			$response = new stdClass;

			$response->configs = $host->getFile(JSON_CONFIGS);

			$response->projects = $host->getFile(JSON_PROJECTS);

			echo json_encode($response);

		break;
		#
		case'create':

			$configs = $host->getFile(JSON_CONFIGS);

			$explode = explode('.', $url);

			if( count($explode)===1)
			{
				$url = $explode[0];
				$domn = '.dev';
			}
			elseif( count($explode)===2)
			{
				$url = $explode[0];
				$domn = ".{$explode[1]}";
			}
			elseif( count($explode)===3)
			{
				$url = "{$explode[0]}.{$explode[1]}";
				$domn = ".{$explode[2]}";
			}

			///

			\Helpers\Strings::createFolder($folder);

			$url = \Helpers\Strings::url( $url );

			$response = array(

				'name' => $name,

				'url' => "{$url}{$domn}",

				'domn' => $domn,

				'folder' => $folder

			);

			///

			$projects = (array) $host->getFile(JSON_PROJECTS);

			$encontrou = false;

			foreach($projects as $proj)
			{
				if( json_encode($proj)==json_encode($response)) $encontrou = true;
			}

			if( !count($projects) || !$encontrou)
			{

				$projects[] = $response;

				$host->putFile( json_encode($projects), JSON_PROJECTS, 'w+' );

				//

				$host->create($response);

				echo json_encode($response);
			}
			else
			{
				echo 'This project already exists...';
			}

		break;
		#
		case'opSystem':

			$response = new stdClass;

			if(substr(PHP_OS,0,3)==='WIN')
			{

				$response->config['os'] = 'windows';

				$letter = substr($_SERVER['DOCUMENT_ROOT'] ,0,1);

				if( is_dir("{$letter}:/wamp")) $response->config['soft'] = 'wampserver';
				if( is_dir("{$letter}:/xampp")) $response->config['soft'] = 'xampp';
			}

			$response->array = json_decode( file_get_contents(JSON_OPSYSTEM));

			//

			echo json_encode($response);

		break;
		#
		case'saveConfig':

			$data = array(

				'os' => $os,

				'soft' => $soft,

				'directory' => trim($directory, '/'),

			);

			$host->putFile($data, JSON_CONFIGS, 'w+');

			\Helpers\Strings::createFolder($directory);

			//

			$local = array(

				'url' => "localhost",

				'domn' => '',

				'folder' => trim($directory, '/')

			);

			$host->create($local);

		break;
		#
	}