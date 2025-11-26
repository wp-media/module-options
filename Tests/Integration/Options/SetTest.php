<?php
declare(strict_types=1);

namespace WPMedia\Options\Tests\Integration\Options;

use WPMedia\Options\Options;
use WPMedia\Options\Tests\Integration\TestCase;

/**
 * @covers WPMedia\Options\Options::set
 * @group Options
 */
class SetTest extends TestCase {
	/**
	 * @dataProvider configTestData
	 *
	 * @param string $prefix Prefix for the option.
	 * @param string $name   Base name of the option.
	 * @param mixed  $value  Value to set for the option.
	 */
	public function testShouldSetOptionValue( $prefix, $name, $value ) {
		$options = new Options( $prefix );

		$options->set( $name, $value );

		$this->assertSame(
			$value,
			get_option( "{$prefix}{$name}" )
		);
	}
}
