<?php

return [

	'theme' => [

		'folder'  => 'themes',
		'active' => 'default' 

		],

	'templates' => [

		'home' 	=> MyTailor\Templates\HomeTemplate::class,
		'shots' => MyTailor\Templates\ShotsTemplate::class,
		'brands' => MyTailor\Templates\BrandsTemplate::class,
		'designers' => MyTailor\Templates\DesignersTemplate::class,
		'profile' =>  MyTailor\Templates\ProfilesTemplate::class,
		'shot' => MyTailor\Templates\ShotTemplate::class,
		'explore' => MyTailor\Templates\ExploreTemplate::class,
		'saves' => MyTailor\Templates\SavesTemplate::class,
		'contact' => MyTailor\Templates\ContactTemplate::class,
		'shotsExplore' => MyTailor\Templates\ShotsExploreTemplate::class,
		'collection' => MyTailor\Templates\CollectionTemplate::class,
		'category' => MyTailor\Templates\CategoryTemplate::class,
		'blog' => MyTailor\Templates\BlogTemplate::class
	]
];
