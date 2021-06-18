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
				'prefix' => '',
				'name'   => 'rocket',
				'value'  => 'yes',
			],
		],
	],
];
