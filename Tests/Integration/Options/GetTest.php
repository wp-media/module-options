<?php
declare(strict_types=1);

namespace WPMedia\Options\Tests\Integration\Options;

use WPMedia\Options\Options;
use WPMedia\Options\Tests\Integration\TestCase;

/**
 * @covers WPMedia\Options\Options::get
 * @group Options
 */
class GetTest extends TestCase {
	/**
	 * @dataProvider configTestData
	 *
	 * @param array<string, mixed> $option   Array of test data.
	 * @param mixed                $expected Expected value.
	 */
	public function testShouldReturnExpectedValue( $option, $expected ) {
		$options = new Options();

		if ( ! is_null( $option['value'] ) ) {
			add_option( $option['name'], $option['value'] );
		}

		$this->assertSame(
			$expected,
			$options->get( $option['name'], $option['default'] )
		);

		delete_option( $option['name'] );
	}
}
