<?php

return [
	'test_data' => [
		'testShouldReturnFalseWhenOptionNotExist' => [
			'option' => [
				'name' => 'rocket',
				'value' => false,
			],
		],
		'testShouldReturnTrueWhenOptionExist' => [
			'option' => [
				'name' => 'rocket',
				'value' => [
					'key' => 'value',
				],
			],
		],
	],
];
