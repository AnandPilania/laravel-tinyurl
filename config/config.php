<?php

return [
    'default' => [
		'encryption' => [
			'salt' => env('APP_KEY'),
			'length' => '4',
			'alphabet' => 'abcedfghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPAQRSTUVWXYZ1234567890',
		],
		'redirect' => [
			'enabled' => true,
			'after' => 10
		],
		'expires' => [
			'enabled' => true,
			'after' => 10
		],
	],
];