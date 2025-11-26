<?php
declare(strict_types=1);

namespace WPMedia\Options\Tests\Integration\SiteOptions;

use WPMedia\Options\SiteOptions;
use WPMedia\Options\Tests\Integration\TestCase;

/**
 * @covers WPMedia\Options\SiteOptions::set
 * @group SiteOptions
 */
class SetTest extends TestCase {
	/**
	 * @dataProvider configTestData
	 *
	 * @param string $prefix Prefix for the site option.
	 * @param string $name   Name of the site option.
	 * @param mixed  $value  Value to set for the site option.
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
