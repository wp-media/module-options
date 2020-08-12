<?php

return [
	'test_data' => [
		'testShouldAddOptionsWhenDoesntExist' => [
			'option' => [
				'foo'  => 'bar',
				'test' => 0,
			],
			'values' => [
				'rocket'  => 'yes',
				'enabled' => true, 
			],
			'expected' => [
				'foo'     => 'bar',
				'test'    => 0,
				'rocket'  => 'yes',
				'enabled' => true,
			],
		],
		'testShouldOverrideOptionsWhenExists' => [
			'option' => [
				'foo'     => 'bar',
				'test'    => 0,
				'rocket'  => 'no',
				'enabled' => false,
			],
			'values' => [
				'rocket'  => 'yes',
				'enabled' => true, 
			],
			'expected' => [
				'foo'     => 'bar',
				'test'    => 0,
				'rocket'  => 'yes',
				'enabled' => true,
			],
		],
	],
];
