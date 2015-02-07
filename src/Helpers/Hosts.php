<?php

    namespace Helpers;

    class Hosts
    {

        use Files;

        public function __call($meth, $args)
        {
            // set
            if(substr($meth,0,3)==='set')
            {
                $key = strtolower( substr( $meth, 3, ( strlen( $meth ) -1)));
                $this->$key = $args[0];
            }
            // get
            if(substr($meth,0,3)==='get')
            {
                $key = strtolower( substr( $meth, 3, ( strlen( $meth ) -1)));
                return $this->$key;
            }
            
        }

        public function vhosts()
		{
			return "\r\n" .
				"\r\n" .
				"<VirtualHost *:80>\r\n" .
				"	ServerAdmin webmaster@{$this->getUrl()}\r\n" .
				"	DocumentRoot {$this->getCaminho()}\r\n" .
				"	ServerName {$this->getUrl()}\r\n" .
				"	ErrorLog logs/{$this->getShortname()}-error.log\r\n" .
				"	CustomLog logs/{$this->getShortname()}-access.log common\r\n" .
				"</VirtualHost>";
		}

        public function hosts()
		{
			return "\r\n127.0.0.1       {$this->getUrl()}";
		}

    }