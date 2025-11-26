<?php
declare(strict_types=1);

namespace WPMedia\Options\Tests\Integration\Options;

use WPMedia\Options\Options;
use WPMedia\Options\Tests\Integration\TestCase;

/**
 * @covers WPMedia\Options\Options::delete
 * @group  Options
 */
class DeleteTest extends TestCase {
	/**
	 * @dataProvider configTestData
	 *
	 * @param array<string, mixed> $option Array of test data.
	 */
	public function testShouldDeleteOption( $option ) {
		$options = new Options( $option['prefix'] );

		add_option( "{$option['prefix']}{$option['name']}", $option['value'] );

		$options->delete( $option['name'] );

		$this->assertFalse( get_option( $option['name'] ) );
	}
}
