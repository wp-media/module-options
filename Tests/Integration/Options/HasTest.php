<?php
declare(strict_types=1);

namespace WPMedia\Options\Tests\Integration\Options;

use WPMedia\Options\Options;
use WPMedia\Options\Tests\Integration\TestCase;

/**
 * @covers WPMedia\Options\Options::has
 * @group  Options
 */
class HasTest extends TestCase {
	/**
	 * @dataProvider configTestData
	 *
	 * @param array<string, mixed> $option Array of test data.
	 */
	public function testShouldReturnExpected( $option ) {
		if ( false !== $option['value'] ) {
			add_option( $option['name'], $option['value'] );
		}

		$options = new Options();

		if ( false !== $option['value'] ) {
			$this->assertTrue( $options->has( $option['name'] ) );
		} else {
			$this->assertFalse( $options->has( $option['name'] ) );
		}

		delete_option( 'rocket' );
	}
}
