<?php

return [
	'test_data' => [
		'testShouldDeletePrefixedOption' => [
			'option' => [
				'prefix' => 'wp_',
				'name'   => 'rocket',
				'value'  => 'yes',
			],
		],
		'testShouldDeleteNonPrefixedOption' => [
			'option' => [
				'prefix' => null,
				'name'   => 'rocket',
				'value'  => 'yes',
			],
		],
	],
];
