<?php
declare(strict_types=1);

namespace WPMedia\Options\Tests\Unit\OptionArray;

use WPMedia\Options\OptionArray;
use WPMedia\Options\Tests\Unit\TestCase;

/**
 * @covers WPMedia\Options\OptionArray::set
 * @group  OptionArray
 */
class SetTest extends TestCase {
	/**
	 * @dataProvider configTestData
	 *
	 * @param array<string, mixed> $option   Value of the option array.
	 * @param string               $key      Key to set in the option array.
	 * @param mixed                $value    Value to set for the given key.
	 * @param array<string, mixed> $expected Expected state of the option array after setting the value.
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
