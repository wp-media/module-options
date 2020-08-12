<?php

namespace WPMedia\Options\Tests\Unit\OptionArray;

use WPMedia\Options\OptionArray;
use WPMedia\Options\Tests\Unit\TestCase;

/**
 * @covers WPMedia\Options\OptionArray::set_values
 * @group  OptionArray
 */
class Test_SetValues extends TestCase {
	/**
	 * @dataProvider configTestData
	 */
	public function testShouldSetValues( $option, $values, $expected ) {
		$options = new OptionArray( $option, 'wpmedia' );

		$options->set_values( $values );

		foreach ( array_keys( $values ) as $key ) {
			$this->assertTrue( $options->has( $key ) );
			$this->assertSame(
				$expected[ $key ],
				$options->get( $key )
			);
		}
	}
}
