<?php

namespace WPMedia\Options\Tests\Integration\Options;

use WPMedia\Options\Options;
use WPMedia\Options\Tests\Integration\TestCase;

/**
 * @covers WPMedia\Options\Options::get
 * @group Options
 */
class Test_Get extends TestCase {
	/**
	 * @dataProvider configTestData
	 */
	public function testShouldReturnExpectedValue( $option, $expected ) {
		$options = new Options();


		if ( ! is_null( $option['value'] ) ) {
			add_option( $option['name'], $option['value'] );
		}

		$this->assertSame(
			$expected,
			$options->get( $option['name'], $option['default'] )
		);

		delete_option( $option['name'] );
	}
}
