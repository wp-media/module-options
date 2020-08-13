<?php

return [
	'test_data' => [
		'testShouldReturnFilteredValueWhenPreFiltering' => [
			'option' => [
				'foo'     => 'bar',
				'test'    => 0,
				'rocket'  => 'no',
				'enabled' => false,
			],
			'key'      => 'rocket',
			'config'   => [
				'exists' => true,
				'pre'    => 'yes',
			],
			'expected' => 'yes',
		],
		'testShouldReturnValueWhenExistsAndNoPrefiltering' => [
			'option' => [
				'foo'     => 'bar',
				'test'    => 0,
				'rocket'  => 'no',
				'enabled' => false,
			],
			'key'      => 'rocket',
			'config'   => [
				'exists' => true,
			],
			'expected' => 'no',
		],
		'testShouldReturnDefaultWhenKeyDoesntExist' => [
			'option' => [
				'foo'     => 'bar',
				'test'    => 0,
				'rocket'  => 'no',
				'enabled' => false,
			],
			'key'      => 'bbq',
			'config'   => [
				'exists' => false,
			],
			'expected' => 'default',
		],
		'testShouldReturnFilteredValueWhenPostFiltering' => [
			'option' => [
				'foo'     => 'bar',
				'test'    => 0,
				'rocket'  => 'no',
				'enabled' => false,
			],
			'key'      => 'foo',
			'config'   => [
				'exists' => true,
				'post'   => 'barbar',
			],
			'expected' => 'barbar',
		],
	],
];
