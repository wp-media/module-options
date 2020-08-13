<?php

namespace WPMedia\Options\Tests\Integration\Options;

use WPMedia\Options\Options;
use WPMedia\Options\Tests\Integration\TestCase;

/**
 * @covers WPMedia\Options\Options::delete
 * @group  Options
 */
class Test_Delete extends TestCase {
	/**
	 * @dataProvider configTestData
	 */
	public function testShoulDeleteOption( $option ) {
		$options = new Options( $option['prefix'] );

		add_option( "{$option['prefix']}{$option['name']}", $option['value'] );

		$options->delete( $option['name'] );

		$this->assertFalse( get_option( $option['name'] ) );
	}
}
