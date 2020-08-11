<?php

namespace WPMedia\Options\Tests\Unit\Options;

use Brain\Monkey\Functions;
use WPMedia\Options\Options;
use WPMedia\Options\Tests\Unit\TestCase;

/**
 * @covers WPMedia\Options\Options::get
 * @group Options
 */
class Test_Get extends TestCase {
	/**
	 * @dataProvider configTestData
	 */
	public function testShouldReturnExpectedValue( $option, $expected ) {
		$options = new Options( 'wpmedia_options_' );


		if ( is_null( $option['value'] ) ) {
			Functions\expect( 'get_option' )
				->once()
				->with( "wpmedia_options_{$option['name']}", $option['default'] )
				->andReturn( $option['default'] );
		} else {
			Functions\expect( 'get_option' )
				->once()
				->with( "wpmedia_options_{$option['name']}", $option['default'] )
				->andReturn( $option['value'] );
		}

		$this->assertSame(
			$expected,
			$options->get( $option['name'], $option['default'] )
		);
	}
}
