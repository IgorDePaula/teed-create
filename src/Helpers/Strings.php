<?php

	namespace Helpers;

	class Strings
	{

		public static function createFolder($folder)
		{
			$path = '';

			foreach(explode('/', $folder) as $fold)
			{
				$path .= "{$fold}/";
				if( !is_dir($path)) mkdir($path);
			}
		}

		public static function url($url)
		{
			return substr($url,0,4)=='http'? $url: "http://{$url}";
		}

	}