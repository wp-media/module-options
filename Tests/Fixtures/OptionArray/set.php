<?php

return [
	'test_data' => [
		'testShouldAddOptionWhenDoesntExist' => [
			'option' => [
				'foo'  => 'bar',
				'test' => 0,
			],
			'key'   => 'rocket',
			'value' => 'yes',
			'expected' => [
				'foo'    => 'bar',
				'test'   => 0,
				'rocket' => 'yes',
			],
		],
		'testShouldOverrideOptionWhenExists' => [
			'option' => [
				'foo'    => 'bar',
				'test'   => 0,
				'rocket' => 'no',
			],
			'key'   => 'rocket',
			'value' => 'yes',
			'expected' => [
				'foo'    => 'bar',
				'test'   => 0,
				'rocket' => 'yes',
			],
		],
	],
];
