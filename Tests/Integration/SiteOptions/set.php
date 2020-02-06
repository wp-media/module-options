<?php

namespace WPMedia\Options\Tests\Integration\SiteOptions;

use WPMedia\Options\SiteOptions;
use WPMedia\Options\Tests\Integration\TestCase;

/**
 * @covers WPMedia\Options\SiteOptions::set
 * @group SiteOptions
 */
class Test_Set extends TestCase {

	public function testShouldSetPrefixedOption() {
		$options = new SiteOptions( 'wpmedia_options_' );

		$data = [
			'test1' => 'some value',
			'test2' => 'off',
			'test3' => [
				'setting1' => 'some value',
				'setting2' => 1,
			],
		];
		foreach( $data as $name => $value ) {
			$options->set( $name, $value );
			$this->assertSame( $value, get_site_option( "wpmedia_options_{$name}" ) );
		}
	}


	public function testShouldSetNonPrefixedOption() {
		$options = new SiteOptions();

		$data = [
			'test1' => 'some value',
			'test2' => 'off',
			'test3' => [
				'setting1' => 'some value',
				'setting2' => 1,
			],
		];
		foreach( $data as $name => $value ) {
			$options->set( $name, $value );
			$this->assertSame( $value, get_site_option( $name ) );
		}
	}
}
