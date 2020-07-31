<?php
return [
	'STATUS'=>[
		'ACTIVE'=>'ACTIVE',
		'INACTIVE'=>'INACTIVE'
	],
	'ROLES' => [
		'SUPERADMIN' => 'SUPERADMIN',
		'ADMIN' 	 => 'ADMIN',
		'PROCESSOR'  => 'PROCESSOR',
		'AGENT' 	 => 'AGENT',
		'USER' 	 => 'USER',
	],
	'SERVICE_TYPE' => [
		'SERVICE' => 'SERVICE',
		'VISA' => 'VISA'
	],	
	'SERVICE_APPLICATION_STATUS' => [
		'APPROVED' => 'APPROVED',
		'PENDING' => 'PENDING'
	],
	'toster' => [
		"closeButton" => false,
		"debug" => false,
		"newestOnTop" => false,
		"progressBar" => false,
		"positionClass" => "toast-top-right",
		"preventDuplicates" => false,
		"onclick" => null,
		"showDuration" => "300",
		"hideDuration" => "1000",
		"timeOut" => "5000",
		"extendedTimeOut" => "1000",
		"showEasing" => "swing",
		"hideEasing" => "linear",
		"showMethod" => "fadeIn",
		"hideMethod" => "fadeOut"
	],
	'PAGE'=>[
        'HOME'    => 'Home',
        'SERVICE' => 'Service',
        'ABOUT'   => 'About',
        'NEWS'   => 'News',
        'TERMS'   => 'Terms and Conditions',
    ],
	'SLIDER_STORE'        =>  'public/slider',
	'SLIDER_IMAGE_GET'    =>  'public/storage/slider',
	'IMAGES'=>[
		'COUNTRY_IMAGE'   =>  'country',
		'COUNTRY_TOURIST_IMAGE'   =>  'country-tourist',
		'SLIDER_IMAGE'        =>  'slider',
	
	]
];