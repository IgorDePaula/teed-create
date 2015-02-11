	<?php

		$os_array = array(
			'/windows nt 6.3/i'     =>  'Windows 8.1',
			'/windows nt 6.2/i'     =>  'Windows 8',
			'/windows nt 6.1/i'     =>  'Windows 7',
			'/windows nt 6.0/i'     =>  'Windows Vista',
			'/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
			'/windows nt 5.1/i'     =>  'Windows XP',
			'/windows xp/i'         =>  'Windows XP',
			'/macintosh|mac os x/i' =>  'Mac OS X',
			'/mac_powerpc/i'        =>  'Mac OS 9',
			'/linux/i'              =>  'Linux',
			'/ubuntu/i'             =>  'Ubuntu',
		);

		$system_user = '';

		foreach( $os_array as $regex => $value)
		{
			if( preg_match( $regex, $_SERVER['HTTP_USER_AGENT'] )) $system_user = $value;
		}

	?>

	<h1>

		Sorry!

		<small class="clearfix"> Seu sistem não é suportado! <strong><?php echo "({$system_user})"; ?></strong> </small>

	</h1>