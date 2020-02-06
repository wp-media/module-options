<?php

namespace WPMedia\Options\Tests\Unit\OptionArray;

use WPMedia\Options\OptionArray;
use WPMedia\Options\Tests\Unit\TestCase;

/**
 * @covers WPMedia\Options\OptionArray::set
 * @group  OptionArray
 */
class Test_Set extends TestCase {
	private static $data = [
		'test1' => 'some value',
		'test2' => 'off',
		'test3' => [
			'setting1' => 'some value',
			'setting2' => 1,
		],
	];

	public function testShouldAddOptionWhenDoesntExist() {
		$options = new OptionArray( [], 'wpmedia' );

		foreach ( self::$data as $key => $value ) {
			$this->assertFalse( $options->has( $key ) );
			$options->set( $key, $value );
			$this->assertTrue( $options->has( $key ) );
			$this->assertSame( $value, $options->get( $key ) );
		}
	}

	public function testShouldOverrideOptionWhenExists() {
		$options = new OptionArray( self::$data, 'wpmedia' );

		foreach ( self::$data as $key => $value ) {
			$new_value = $key;
			$this->assertTrue( $options->has( $key ) );
			$options->set( $key, $new_value );
			$this->assertTrue( $options->has( $key ) );
			$this->assertSame( $new_value, $options->get( $key ) );
		}
	}
}
