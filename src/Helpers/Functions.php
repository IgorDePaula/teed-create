<?php

	namespace Helpers;

	class Functions
	{

		public static function url_to_path( $url )
		{
			return sprintf( '%s%s', WINDIR, $url );
		}

	}