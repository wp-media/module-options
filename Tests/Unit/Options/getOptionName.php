<?php

namespace WPMedia\Options\Tests\Unit\Options;

use WPMedia\Options\Options;
use WPMedia\Options\Tests\Unit\TestCase;

/**
 * @covers WPMedia\Options\Options::get_option_name
 * @group Options
 */
class Test_GetOptionName extends TestCase {
	/**
	 * @dataProvider configTestData
	 */
	public function testShouldReturnOptionName( $prefix, $option, $expected ) {
		$options = new Options( $prefix );

		$this->assertSame(
			$expected,
			$options->get_option_name( $option )
		);
	}
}
