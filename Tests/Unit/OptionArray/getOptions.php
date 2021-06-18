<?php

namespace WPMedia\Options\Tests\Unit\OptionArray;

use WPMedia\Options\OptionArray;
use WPMedia\Options\Tests\Unit\TestCase;

/**
 * @covers WPMedia\Options\OptionArray::get_options
 * @group  OptionArray
 */
class Test_GetOptions extends TestCase {
	/**
	 * @dataProvider configTestData
	 */
	public function testShouldReturnExpectedArray( $option ) {
		$options = new OptionArray( $option, 'wpmedia' );

		$this->assertSame(
			$option,
			$options->get_options()
		);
	}
}
