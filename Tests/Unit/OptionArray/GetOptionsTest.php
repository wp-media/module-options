<?php
declare(strict_types=1);

namespace WPMedia\Options\Tests\Unit\OptionArray;

use WPMedia\Options\OptionArray;
use WPMedia\Options\Tests\Unit\TestCase;

/**
 * @covers WPMedia\Options\OptionArray::get_options
 * @group  OptionArray
 */
class GetOptionsTest extends TestCase {
	/**
	 * @dataProvider configTestData
	 *
	 * @param array<string, mixed> $option Value of the option array.
	 */
	public function testShouldReturnExpectedArray( $option ) {
		$options = new OptionArray( $option, 'wpmedia' );

		$this->assertSame(
			$option,
			$options->get_options()
		);
	}
}
