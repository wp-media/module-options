<?php

namespace WPMedia\Options\Tests\Unit\Options_Data;

use WP_Rocket\Admin\Options_Data;
use WPMedia\Options\Tests\Unit\TestCase;

/**
 * @covers WP_Rocket\Admin\Options_Data::set_values
 * @group  OptionsData
 */
class Test_SetValues extends TestCase {
	private static $data = [
		'test1' => 'some value',
		'test2' => 'off',
		'test3' => [
			'setting1' => 'some value',
			'setting2' => 1,
		],
	];

	public function testShouldAddOptionsWhenDontExist() {
		$options = new Options_Data( [] );

		// Check that the options do not exist.
		foreach ( self::$data as $key => $value ) {
			$this->assertFalse( $options->has( $key ) );
		}

		$options->set_values( self::$data );

		// Check that the options do exist.
		foreach ( self::$data as $key => $value ) {
			$this->assertTrue( $options->has( $key ) );
			$this->assertSame( $value, $options->get( $key ) );
		}
	}

	public function testShouldOverrideOptionsWhenExists() {
		$options = new Options_Data( self::$data );

		// Check that the options do exist.
		foreach ( self::$data as $key => $value ) {
			$this->assertTrue( $options->has( $key ) );
			$this->assertSame( $value, $options->get( $key ) );
		}

		// Modify the values.
		$new_options = self::$data;
		foreach ( $new_options as $key => $value ) {
			$new_options[ $key ] = is_array( $value ) ? "{$key}_new" : "{$value}_new";
		}

		$options->set_values( $new_options );

		// Check that each option was updated with the new value.
		foreach ( $new_options as $key => $value ) {
			$this->assertTrue( $options->has( $key ) );
			$this->assertSame( $value, $options->get( $key ) );
		}
	}
}
