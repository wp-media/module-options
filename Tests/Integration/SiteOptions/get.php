<?php

namespace WPMedia\Options\Tests\Integration\SiteOptions;

use WPMedia\Options\SiteOptions;
use WPMedia\Options\Tests\Integration\TestCase;

/**
 * @covers WPMedia\Options\SiteOptions::get
 * @group SiteOptions
 */
class Test_Get extends TestCase {
	/**
	 * @dataProvider configTestData
	 */
	public function testShouldReturnExpectedValue( $option, $expected ) {
		$options = new SiteOptions();


		if ( ! is_null( $option['value'] ) ) {
			add_site_option( $option['name'], $option['value'] );
		}

		$this->assertSame(
			$expected,
			$options->get( $option['name'], $option['default'] )
		);

		delete_site_option( $option['name'] );
	}
}
