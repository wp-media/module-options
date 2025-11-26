<?php
declare(strict_types=1);

namespace WPMedia\Options\Tests\Unit\OptionArray;

use WPMedia\Options\OptionArray;
use WPMedia\Options\Tests\Unit\TestCase;

/**
 * @covers WPMedia\Options\OptionArray::set_values
 * @group  OptionArray
 */
class SetValuesTest extends TestCase {
	/**
	 * @dataProvider configTestData
	 *
	 * @param array<string, mixed> $option   Array of data to configure the option.
	 * @param array<string, mixed> $values   Values to set.
	 * @param array<string, mixed> $expected Expected values after setting.
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
