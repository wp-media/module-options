<?php

return [
	'test_data' => [
		'testShouldReturnDefaultWhenOptionDoesntExist' => [
			'option' => [
				'name'    => 'rocket',
				'default' => [],
				'value'   => null,
			],
			'expected' => [],
		],
		'testShouldReturnOptionWhenExists' => [
			'option' => [
				'name'    => 'rocket',
				'default' => '',
				'value'   => 'foobar',
			],
			'expected' => 'foobar',
		],
		'testShouldReturnOptionAsArrayWhenExistsAsStringAndDefaultIsArray' => [
			'option' => [
				'name'    => 'rocket',
				'default' => [],
				'value'   => 'foobar',
			],
			'expected' => [
				'foobar',
			],
		],
	],
];
