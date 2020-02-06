<?php

namespace WPMedia\Options\Tests\Integration\OptionArray;

use WPMedia\Options\OptionArray;
use WPMedia\Options\Tests\Integration\TestCase;

/**
 * @covers WPMedia\Options\OptionArray::get
 * @group  OptionArray
 */
class Test_Get extends TestCase {

	public function testShouldReturnFilteredValueWhenPreFiltering() {
		$data    = [
			'test1' => 'some value',
			'test2' => 'off',
			'test3' => 'heya',
		];
		$options = new OptionArray( $data, 'wpmedia' );

		foreach ( array_keys( $data ) as $key ) {
			$default = "{$key}_default";
			$callback = function( $null, $default ) {
				return $default;
			};

			add_filter( "wpmedia_pre_get_option_{$key}", $callback, 10, 2 );

			$this->assertSame( $default, $options->get( $key, $default ) );

			remove_filter( "wpmedia_pre_get_option_{$key}", $callback );
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
		$options = new OptionArray( $data, 'wpmedia' );

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
		$options = new OptionArray( $data, 'wpmedia' );

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
		$options = new OptionArray( $data, 'wpmedia' );

		foreach ( $data as $key => $value ) {
			$filtered = "{$key}_filtered";
			$callback = function( $value ) use ($filtered) {
				return $filtered;
			};

			add_filter( "wpmedia_get_option_{$key}", $callback );

			$this->assertSame( $filtered, $options->get( $key, 'default' ) );

			remove_filter( "wpmedia_get_option_{$key}", $callback );
		}
	}
}
