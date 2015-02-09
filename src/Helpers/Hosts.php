<?php

	namespace Helpers;

	class Hosts
	{

		use Files;

		public $data = array();

		public function __call($meth, $args)
		{
			if(substr($meth,0,3)==='set')
			{
				$key = strtolower( substr( $meth, 3, ( strlen( $meth ) -1)));
				$this->data[$key] = $args[0];
			}

			if(substr($meth,0,3)==='get')
			{
				$key = strtolower( substr( $meth, 3, ( strlen( $meth ) -1)));
				return isset($this->data[$key])? $this->data[$key] :null;
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

		public function create($project)
		{
			$this->setUrl( str_replace('http://','', trim( $project['url'] ,'/' ) ) );
			$this->setCaminho( $project['folder'] );
			$this->setShortname( str_replace( $project['domn'], '', $this->getUrl()) );

			//

			$configs = $this->getFile(JSON_CONFIGS);

			$opSystem = $this->getFile(JSON_OPSYSTEM);

			$vhost = $opSystem->{$configs->os}->{$configs->soft}->vhost;

			$host = $opSystem->{$configs->os}->{$configs->soft}->hosts;

			//

			if(!preg_match("/ServerName {$this->getUrl()}/", $this->getFile($vhost,true)))
			{
				$this->putFile($this->vhosts(), $vhost);
			}

			if(!preg_match("/127.0.0.1       {$this->getUrl()}/", $this->getFile($host,true)))
			{
				$this->putFile($this->hosts(), $host);
			}
		}

	}