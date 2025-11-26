<?php
declare(strict_types=1);

namespace WPMedia\Options\Tests\Unit\OptionArray;

use WPMedia\Options\OptionArray;
use WPMedia\Options\Tests\Unit\TestCase;

/**
 * @covers WPMedia\Options\OptionArray::has
 * @group  OptionArray
 */
class HasTest extends TestCase {
	/**
	 * @dataProvider configTestData
	 *
	 * @param array<string, mixed> $option   Value of the option array.
	 * @param string               $key      Key to check in the option array.
	 * @param bool                 $expected Expected result.
	 */
	public function testShouldReturnExpected( $option, $key, $expected ) {
		$options = new OptionArray( $option, 'wpmedia' );

		$this->assertSame(
			$expected,
			$options->has( $key )
		);
	}
}
