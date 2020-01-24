<?php

namespace WPMedia\Options\Tests\Unit\Options_Data;

use WP_Rocket\Admin\Options_Data;
use WPMedia\Options\Tests\Unit\TestCase;

/**
 * @covers WP_Rocket\Admin\Options_Data::get_options
 * @group  OptionsData
 */
class Test_GetOptions extends TestCase {

	public function testShouldReturnEmptyWhenNoOptions() {
		$options = new Options_Data( [] );
		$this->assertEmpty( $options->get_options() );
	}

	public function testShouldReturnAllOptionsWhenExists() {
		$data    = [
			'test1' => 'some value',
			'test2' => 'off',
			'test3' => 'heya',
		];
		$options = new Options_Data( $data );
		$this->assertSame( $data, $options->get_options() );
	}
}
