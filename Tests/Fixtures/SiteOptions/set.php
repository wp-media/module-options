<?php

return [
	'test_data' => [
		'testShouldSetPrefixedOption' => [
			'prefix' => 'wpmedia_options_',
			'name'   => 'rocket',
			'value'  => 'foobar',
		],
		'testShouldSetNonPrefixedOption' => [
			'prefix' => null,
			'name'   => 'rocket',
			'value'  => 'foobar',
		],
	],
];