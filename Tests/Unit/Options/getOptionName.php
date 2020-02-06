<?php

namespace WPMedia\Options\Tests\Unit\Options;

use WPMedia\Options\Options;
use WPMedia\Options\Tests\Unit\TestCase;

/**
 * @covers WPMedia\Options\Options::getOptionName
 * @group Options
 */
class Test_GetOptionName extends TestCase {

	public function testShouldReturnPrefixedNameWhenPrefixIsSet() {
		$options = new Options( 'wpmedia_options_' );
		$this->assertSame( 'wpmedia_options_test', $options->getOptionName( 'test' ) );
		$this->assertSame( 'wpmedia_options_rocket', $options->getOptionName( 'rocket' ) );
	}

	public function testShouldReturnNonPrefixedNameWhenNoPrefixIsSet() {
		$options = new Options();
		$this->assertSame( 'test', $options->getOptionName( 'test' ) );
		$this->assertSame( 'rocket', $options->getOptionName( 'rocket' ) );
	}
}
