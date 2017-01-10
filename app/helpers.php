<?php

if (! function_exists('theme'))	{
	
	function theme($path) {
		$config = app('config')->get('cms.theme');

		return url($config['folder'].'/'.$config['active'].'/assets/'.$path);
	}
}


if (! function_exists('setActive'))	{
	
	function setActive($path, $active = '__active') {
		
		return Request::is($path) ? $active : '';
	}
}



if (! function_exists('profileCheck'))	{

	function profileCheck($profile, $user) {

		if($user) {
			if($profile->username == $user->profile->username)
				return true;
		}
		return false;
	}
}

if (! function_exists('avatarRoute'))	{

	function avatarRoute($profileA, $user) {
		if($user) {
			if($profileA->username == $user->profile->username)

			return 'edit';
		}

		return "contact";
	}
}