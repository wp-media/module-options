<?php

namespace WPMedia\Options\Tests\Unit\OptionArray;

use WPMedia\Options\OptionArray;
use WPMedia\Options\Tests\Unit\TestCase;

/**
 * @covers WPMedia\Options\OptionArray::has
 * @group  OptionArray
 */
class Test_Has extends TestCase {
	private static $data = [
		'test1' => 'some value',
		'test2' => 'off',
		'test3' => [
			'setting1' => 'some value',
			'setting2' => 1,
		],
	];

	public function testShouldReturnTrueWhenHasOption() {
		$options = new OptionArray( self::$data, 'wpmedia' );

		foreach ( array_keys( self::$data ) as $key ) {
			$this->assertTrue( $options->has( $key ) );
		}
	}

	public function testShouldReturnFalseWhenDoesnotExist() {
		$options = new OptionArray( self::$data, 'wpmedia' );

		$this->assertFalse( $options->has( 'invalid_key' ) );
		$this->assertFalse( $options->has( 'test4' ) );
		$this->assertFalse( $options->has( 'setting1' ) );
		$this->assertFalse( $options->has( 'setting2' ) );
	}
}
