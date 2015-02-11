<?php

	namespace Helpers;

	class Files
	{

		public static function get_file( $file_name )
		{

			if( !file_exists( $file_name)) return;

			if( count( explode( '.', $file_name ) ) )
			{

				if( Arrays::last( explode( '.', $file_name ) ) == 'json' )
				{

					return json_decode( file_get_contents( $file_name ) );

				}
				elseif( Arrays::last( explode( '.', $file_name ) ) == 'php' )
				{

					ob_start();

					include( $file_name );

					return ob_get_clean();

				}

			}
			else
			{

				return file_get_contents( $file_name );

			}
		}

		public static function save_file( $file_name, $data )
		{

			self::create_path( $file_name );

			if( $to_json)
			{

				return json_encode( file_get_contents( $file_name ));

			}
			else
			{

				return file_get_contents( $file_name );

			}
		}

		public static function create_path( $path_name )
		{

			$pathinfo = pathinfo($path_name);

			if( isset( $pathinfo['extension'] ) && in_array( $pathinfo['extension'], ['html','php','json','css'] ) ) $path_name = $pathinfo['dirname'];

			$path_to = '';

			foreach( explode( '/', $path_name ) as $value )
			{

				$path_to .= "{$value}/";

				if( !is_dir($path_to)) mkdir( $path_to);
			}
		}

	}