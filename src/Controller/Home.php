<?php

	namespace Controller;

	class Home
	{

		use Base;

		public static $template = 'master';

		###

		public static function get_home()
		{

			self::set_title( 'Home'  );

			self::get_view();

		}

	}