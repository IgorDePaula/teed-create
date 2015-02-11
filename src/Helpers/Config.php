<?php


	namespace Helpers;

	class Config
	{

		public static function get_data( $file_name )
		{
			return Files::get_file( APP_DATA . "{$file_name}.json" );
		}

	}