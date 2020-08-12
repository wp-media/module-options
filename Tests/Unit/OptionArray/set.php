<?php

namespace WPMedia\Options\Tests\Unit\OptionArray;

use WPMedia\Options\OptionArray;
use WPMedia\Options\Tests\Unit\TestCase;

/**
 * @covers WPMedia\Options\OptionArray::set
 * @group  OptionArray
 */
class Test_Set extends TestCase {
	/**
	 * @dataProvider configTestData
	 */
	public function testShouldSetValue( $option, $key, $value, $expected ) {
		$options = new OptionArray( $option, 'wpmedia' );

		$options->set( $key, $value );
		$this->assertTrue( $options->has( $key ) );
		$this->assertSame(
			$expected[ $key ],
			$options->get( $key )
		);
	}
}
