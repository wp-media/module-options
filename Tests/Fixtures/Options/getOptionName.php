<?php

return [
	'test_data' => [
		'testShouldReturnPrefixedNameWhenPrefixIsSet' => [
			'prefix'   => 'wpmedia_options_',
			'option'   => 'rocket',
			'expected' => 'wpmedia_options_rocket',
		],
		'testShouldReturnNonPrefixedNameWhenNoPrefixIsSet' => [
			'prefix'   => '',
			'option'   => 'rocket',
			'expected' => 'rocket',
		],
	],
];
