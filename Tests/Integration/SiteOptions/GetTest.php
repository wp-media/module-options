<?php
declare(strict_types=1);

namespace WPMedia\Options\Tests\Integration\SiteOptions;

use WPMedia\Options\SiteOptions;
use WPMedia\Options\Tests\Integration\TestCase;

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
