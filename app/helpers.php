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