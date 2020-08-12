<?php

namespace WPMedia\Options\Tests\Integration\Options;

use WPMedia\Options\Options;
use WPMedia\Options\Tests\Integration\TestCase;

/**
 * @covers WPMedia\Options\Options::set
 * @group Options
 */
class Test_Set extends TestCase {
	/**
	 * @dataProvider configTestData
	 */
	public function testShouldSetOptionValue( $prefix, $name, $value ) {
		$options = new Options( $prefix );

		$options->set( $name, $value );

		$this->assertSame(
			$value,
			get_option( "{$prefix}{$name}" )
		);
	}
}
