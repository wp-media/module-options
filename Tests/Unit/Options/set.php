<?php

namespace WPMedia\Options\Tests\Unit\Options;

use Brain\Monkey\Functions;
use WPMedia\Options\Options;
use WPMedia\Options\Tests\Unit\TestCase;

/**
 * @covers WPMedia\Options\Options::set
 * @group Options
 */
class Test_Set extends TestCase {

	public function testShouldSetPrefixedOption() {
		$options = new Options( 'wpmedia_options_' );

		$data = [
			'test1' => 'some value',
			'test2' => 'off',
			'test3' => [
				'setting1' => 'some value',
				'setting2' => 1,
			],
		];
		foreach( $data as $name => $value ) {
			Functions\expect( 'update_option' )
				->once()
				->with( "wpmedia_options_{$name}", $value );

			$options->set( $name, $value );
		}
	}


	public function testShouldSetNonPrefixedOption() {
		$options = new Options();

		$data = [
			'test1' => 'some value',
			'test2' => 'off',
			'test3' => [
				'setting1' => 'some value',
				'setting2' => 1,
			],
		];
		foreach( $data as $name => $value ) {
			Functions\expect( 'update_option' )
				->once()
				->with( $name, $value );

			$options->set( $name, $value );
		}
	}
}
