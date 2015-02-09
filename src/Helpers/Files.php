<?php

	namespace Helpers;

	trait Files
	{

		public static function putFile($data,$file,$type='a+')
		{

			if(is_array($data)||is_object($data)) $data = json_encode($data);

			$file = fopen($file, $type);
			fwrite($file, $data);
			fclose($file);
			return;
		}

		public static function getFile($file, $string=false)
		{
			if(!file_exists($file)) self::putFile('',$file);

			if( $string) return file_get_contents($file);
			else return json_decode(file_get_contents($file));
		}

	}