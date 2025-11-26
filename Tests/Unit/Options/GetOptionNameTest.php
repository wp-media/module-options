<?php
declare(strict_types=1);

namespace WPMedia\Options\Tests\Unit\Options;

use WPMedia\Options\Options;
use WPMedia\Options\Tests\Unit\TestCase;

/**
 * @covers WPMedia\Options\Options::get_option_name
 * @group Options
 */
class GetOptionNameTest extends TestCase {
	/**
	 * @dataProvider configTestData
	 *
	 * @param string $prefix Prefix for the option name.
	 * @param string $name   Base name of the option.
	 * @param string $expected Expected full option name.
	 */
	public function testShouldReturnOptionName( $prefix, $name, $expected ) {
		$options = new Options( $prefix );

		$this->assertSame(
			$expected,
			$options->get_option_name( $name )
		);
	}
}
