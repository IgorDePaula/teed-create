<?php

	namespace Controller;

	trait Base
	{

		public static $data = [];

		public static function __callStatic( $key, $value )
		{

			self::$data[ explode( '_', $key )[1] ] = $value[0];

		}

		public static function get_view( $view=null )
		{


			if( !isset( pathinfo($view)['extension'] ) )
			{

				if( empty( $view ) || count( explode( '/', $view ) ) === 1 )
				{

					$view = strtolower(CONTROLLER_NAME) . '/index.php';

				}
				elseif( count( explode( '/', $view ) ) > 1 )
				{

					$view .= '/index.php';

				}

			}

			$container = VIEWS_PAGES . $view;

			if( !file_exists( $container ) )
			{


				self::$data['title'] = "404 - {$view}";

				$container = VIEWS_PAGES . '404.php';

			}

			###

				extract( self::$data );

			###

			include VIEWS_TEMPLATES . self::$template . '/template.php';

		}

	}