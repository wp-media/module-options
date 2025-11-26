<?php
declare(strict_types=1);

namespace WPMedia\Options\Tests\Unit\SiteOptions;

use Brain\Monkey\Functions;
use WPMedia\Options\SiteOptions;
use WPMedia\Options\Tests\Unit\TestCase;

/**
 * @covers WPMedia\Options\SiteOptions::get
 * @group SiteOptions
 */
class GetTest extends TestCase {
	/**
	 * @dataProvider configTestData
	 *
	 * @param array<string, mixed> $option   Array of test data.
	 * @param mixed                $expected Expected value.
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
