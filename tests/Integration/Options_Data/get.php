<?php

namespace WPMedia\Options\Tests\Integration\Options_Data;

use WP_Rocket\Admin\Options_Data;
use WPMedia\Options\Tests\Integration\TestCase;

/**
 * @covers WP_Rocket\Admin\Options_Data::get
 * @group  OptionsData
 */
class Test_Get extends TestCase {

	public function testShouldReturnFilteredValueWhenPreFiltering() {
		$data    = [
			'test1' => 'some value',
			'test2' => 'off',
			'test3' => 'heya',
		];
		$options = new Options_Data( $data );

		foreach ( array_keys( $data ) as $key ) {
			$default = "{$key}_default";
			$callback = function( $null, $default ) {
				return $default;
			};

			add_filter( "pre_get_rocket_option_{$key}", $callback, 10, 2 );

			$this->assertSame( $default, $options->get( $key, $default ) );

			remove_filter( "pre_get_rocket_option_{$key}", $callback );
		}
	}

	public function testShouldReturnValueWhenExistsAndNoPrefiltering() {
		$data    = [
			'test1' => 'some value',
			'test2' => 'off',
			'test3' => [
				'setting1' => 'some value',
				'setting2' => 1,
			],
		];
		$options = new Options_Data( $data );

		foreach ( $data as $key => $value ) {
			$this->assertSame( $value, $options->get( $key, 'default' ) );
		}
	}

	public function testShouldReturnDefaultWhenKeyDoesntExist() {
		$data    = [
			'test1' => 'some value',
			'test2' => 'off',
			'test3' => [
				'setting1' => 'some value',
				'setting2' => 1,
			],
		];
		$options = new Options_Data( $data );

		foreach ( [ 'test10', 'test11', 'setting1' ] as $key ) {
			$this->assertSame( 'default', $options->get( $key, 'default' ) );
		}
	}

	public function testShouldReturnFilteredValueWhenPostFiltering() {
		$data    = [
			'test1' => 'some value',
			'test2' => 'off',
			'test3' => 'heya',
		];
		$options = new Options_Data( $data );

		foreach ( $data as $key => $value ) {
			$filtered = "{$key}_filtered";
			$callback = function( $value ) use ($filtered) {
				return $filtered;
			};

			add_filter( "get_rocket_option_{$key}", $callback );

			$this->assertSame( $filtered, $options->get( $key, 'default' ) );

			remove_filter( "get_rocket_option_{$key}", $callback );
		}
	}
}
