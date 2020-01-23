<?php

namespace WPMedia\Options\Tests\Unit\Options_Data;

use WP_Rocket\Admin\Options_Data;
use WPMedia\Options\Tests\Unit\TestCase;

/**
 * @covers WP_Rocket\Admin\Options_Data::has
 * @group  OptionsData
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
		$options = new Options_Data( self::$data );

		foreach ( array_keys( self::$data ) as $key ) {
			$this->assertTrue( $options->has( $key ) );
		}
	}

	public function testShouldReturnFalseWhenDoesnotExist() {
		$options = new Options_Data( self::$data );

		$this->assertFalse( $options->has( 'invalid_key' ) );
		$this->assertFalse( $options->has( 'test4' ) );
		$this->assertFalse( $options->has( 'setting1' ) );
		$this->assertFalse( $options->has( 'setting2' ) );
	}
}
