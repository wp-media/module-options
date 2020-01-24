<?php

namespace WPMedia\Options\Tests\Unit\Options;

use WP_Rocket\Admin\Options;
use WPMedia\Options\Tests\Unit\TestCase;

/**
 * @covers WP_Rocket\Admin\Options::get_option_name
 * @group Options
 */
class Test_GetOptionName extends TestCase {

	public function testShouldReturnPrefixedNameWhenPrefixIsSet() {
		$options = new Options( 'wpmedia_options_' );
		$this->assertSame( 'wpmedia_options_test', $options->get_option_name( 'test' ) );
		$this->assertSame( 'wpmedia_options_rocket', $options->get_option_name( 'rocket' ) );
	}

	public function testShouldReturnNonPrefixedNameWhenNoPrefixIsSet() {
		$options = new Options();
		$this->assertSame( 'test', $options->get_option_name( 'test' ) );
		$this->assertSame( 'rocket', $options->get_option_name( 'rocket' ) );
	}
}
