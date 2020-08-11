<?php

namespace WPMedia\Options\Tests\Unit\OptionArray;

use WPMedia\Options\OptionArray;
use WPMedia\Options\Tests\Unit\TestCase;

/**
 * @covers WPMedia\Options\OptionArray::has
 * @group  OptionArray
 */
class Test_Has extends TestCase {

	/**
	 * @dataProvider configTestData
	 */
	public function testShouldReturnExpected( $option, $key, $expected ) {
		$options = new OptionArray( $option, 'wpmedia' );

		$this->assertSame( 
			$expected,
			$options->has( $key )
		);
	}
}
