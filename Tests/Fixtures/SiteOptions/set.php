<?php

return [
	'test_data' => [
		'testShouldSetPrefixedOption' => [
			'prefix' => 'wpmedia_options_',
			'name'   => 'rocket',
			'value'  => 'foobar',
		],
		'testShouldSetNonPrefixedOption' => [
			'prefix' => '',
			'name'   => 'rocket',
			'value'  => 'foobar',
		],
	],
];
