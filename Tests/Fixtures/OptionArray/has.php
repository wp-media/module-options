<?php

return [
	'test_data' => [
		'testShouldReturnFalseWhenArrayNotHasKey' => [
			'option'   => [
				'test' => 'value',
			],
			'key'      => 'foobar',
			'expected' => false,
		],
		'testShouldReturnTrueWhenArrayHasKey' => [
			'option'   => [
				'test'   => 'value',
				'foobar' => 'foo'
			],
			'key'      => 'foobar',
			'expected' => true,
		],
	],
];
