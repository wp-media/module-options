<?php

namespace WPMedia\Options\Tests\Integration\SiteOptions;

use WPMedia\Options\SiteOptions;
use WPMedia\Options\Tests\Integration\TestCase;

/**
 * @covers WPMedia\Options\SiteOptions::set
 * @group SiteOptions
 */
class Test_Set extends TestCase {
	/**
	 * @dataProvider configTestData
	 */
	public function testShouldSetOptionValue( $prefix, $name, $value ) {
		$options = new SiteOptions( $prefix );

		$options->set( $name, $value );

		$this->assertSame(
			$value,
			get_site_option( "{$prefix}{$name}" )
		);
	}
}
