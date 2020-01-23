<?php

namespace WPMedia\Options\Tests\Unit\Options;

use WP_Rocket\Admin\Options;
use WPMedia\Options\Tests\Unit\TestCase;

/**
 * @covers WP_Rocket\Admin\Options::get
 * @group Options
 */
class Test_Get extends TestCase {

	public function testShouldReturnDefaultWhenOptionDoesntExist() {
		$options = new Options( 'wpmedia_options_' );

		$this->assertNull( $options->get( 'test1' ) );
		$this->assertFalse( $options->get( 'test2', false ) );
		$this->assertSame( [ 'default' ], $options->get( 'test3', [ 'default' ] ) );
	}

	public function testShouldReturnOptionWhenExists() {
		$options = new Options( 'wpmedia_options_' );

		$data = [
			'test1' => 'some value',
			'test2' => 'off',
			'test3' => [
				'setting1' => 'some value',
				'setting2' => 1,
			],
		];
		foreach( $data as $key => $value ) {
			update_option( "wpmedia_options_{$key}", $value );
			$this->assertSame( $value, $options->get( $key ) );
		}
	}
}
