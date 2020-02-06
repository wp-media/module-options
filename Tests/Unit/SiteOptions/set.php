<?php

namespace WPMedia\Options\Tests\Unit\SiteOptions;

use Brain\Monkey\Functions;
use WPMedia\Options\SiteOptions;
use WPMedia\Options\Tests\Unit\TestCase;

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
			Functions\expect( 'update_site_option' )
				->once()
				->with( "wpmedia_options_{$name}", $value );

			$options->set( $name, $value );
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
			Functions\expect( 'update_site_option' )
				->once()
				->with( $name, $value );

			$options->set( $name, $value );
		}
	}
}
