<?php

namespace WPMedia\Options\Tests\Unit\SiteOptions;

use Brain\Monkey\Functions;
use WPMedia\Options\SiteOptions;
use WPMedia\Options\Tests\Unit\TestCase;

/**
 * @covers WPMedia\Options\SiteOptions::get
 * @group SiteOptions
 */
class Test_Get extends TestCase {
	/**
	 * @dataProvider configTestData
	 */
	public function testShouldReturnExpectedValue( $option, $expected ) {
		$options = new SiteOptions( 'wpmedia_options_' );


		if ( is_null( $option['value'] ) ) {
			Functions\expect( 'get_site_option' )
				->once()
				->with( "wpmedia_options_{$option['name']}", $option['default'] )
				->andReturn( $option['default'] );
		} else {
			Functions\expect( 'get_site_option' )
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
