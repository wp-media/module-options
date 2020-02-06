<?php

namespace WPMedia\Options\Tests\Unit\OptionArray;

use WPMedia\Options\OptionArray;
use WPMedia\Options\Tests\Unit\TestCase;

/**
 * @covers WPMedia\Options\OptionArray::get_options
 * @group  OptionArray
 */
class Test_GetOptions extends TestCase {

	public function testShouldReturnEmptyWhenNoOptions() {
		$options = new OptionArray( [], 'wpmedia' );
		$this->assertEmpty( $options->get_options() );
	}

	public function testShouldReturnAllOptionsWhenExists() {
		$data    = [
			'test1' => 'some value',
			'test2' => 'off',
			'test3' => 'heya',
		];
		$options = new OptionArray( $data, 'wpmedia' );
		$this->assertSame( $data, $options->get_options() );
	}
}
