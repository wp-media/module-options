<?php

namespace WPMedia\Options\Tests\Integration\SiteOptions;

use WPMedia\Options\SiteOptions;
use WPMedia\Options\Tests\Integration\TestCase;

/**
 * @covers WPMedia\Options\SiteOptions::get
 * @group SiteOptions
 */
class Test_Get extends TestCase {

	public function testShouldReturnDefaultWhenOptionDoesntExist() {
		$options = new SiteOptions( 'wpmedia_options_' );

		$this->assertNull( $options->get( 'test1' ) );
		$this->assertFalse( $options->get( 'test2', false ) );
		$this->assertSame( [ 'default' ], $options->get( 'test3', [ 'default' ] ) );
	}

	public function testShouldReturnOptionWhenExists() {
		$options = new SiteOptions( 'wpmedia_options_' );

		$data = [
			'test1' => 'some value',
			'test2' => 'off',
			'test3' => [
				'setting1' => 'some value',
				'setting2' => 1,
			],
		];
		foreach( $data as $key => $value ) {
			update_site_option( "wpmedia_options_{$key}", $value );
			$this->assertSame( $value, $options->get( $key ) );
		}
	}
}
