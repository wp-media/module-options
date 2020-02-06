<?php

namespace WPMedia\Options\Tests\Integration\Options;

use WPMedia\Options\Options;
use WPMedia\Options\Tests\Integration\TestCase;

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
			$options->set( $name, $value );
			$this->assertSame( $value, get_option( "wpmedia_options_{$name}" ) );
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
			$options->set( $name, $value );
			$this->assertSame( $value, get_option( $name ) );
		}
	}
}
