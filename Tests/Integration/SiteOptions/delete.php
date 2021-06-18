<?php

namespace WPMedia\Options\Tests\Integration\SiteOptions;

use WPMedia\Options\SiteOptions;
use WPMedia\Options\Tests\Integration\TestCase;

/**
 * @covers WPMedia\Options\SiteOptions::delete
 * @group SiteOptions
 */
class Test_Delete extends TestCase {
	/**
	 * @dataProvider configTestData
	 */
	public function testShoulDeleteOption( $option ) {
		$options = new SiteOptions( $option['prefix'] );

		add_site_option( "{$option['prefix']}{$option['name']}", $option['value'] );

		$options->delete( $option['name'] );

		$this->assertFalse( get_option( $option['name'] ) );
	}
}
