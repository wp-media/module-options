<?php
declare(strict_types=1);

namespace WPMedia\Options\Tests\Integration\SiteOptions;

use WPMedia\Options\SiteOptions;
use WPMedia\Options\Tests\Integration\TestCase;

/**
 * @covers WPMedia\Options\SiteOptions::delete
 * @group SiteOptions
 */
class DeleteTest extends TestCase {
	/**
	 * @dataProvider configTestData
	 *
	 * @param array<string, mixed> $option Array of test data.
	 */
	public function testShoulDeleteOption( $option ) {
		$options = new SiteOptions( $option['prefix'] );

		add_site_option( "{$option['prefix']}{$option['name']}", $option['value'] );

		$options->delete( $option['name'] );

		$this->assertFalse( get_option( $option['name'] ) );
	}
}
