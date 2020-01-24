<?php

namespace WPMedia\Options\Tests\Unit\Options;

use Brain\Monkey\Functions;
use WP_Rocket\Admin\Options;
use WPMedia\Options\Tests\Unit\TestCase;

/**
 * @covers WP_Rocket\Admin\Options::delete
 * @group  Options
 */
class Test_Delete extends TestCase {

	public function testShouldDeletePrefixedOption() {
		$options = new Options( 'wpmedia_options_' );

		foreach ( [ 'test1', 'test2', 'setting3' ] as $name ) {
			Functions\expect( 'delete_option' )
				->once()
				->with( "wpmedia_options_{$name}" );

			$options->delete( $name );
		}
	}

	public function testShouldDeleteNonPrefixedOption() {
		$options = new Options();

		foreach ( [ 'test1', 'test2', 'setting3' ] as $name ) {
			Functions\expect( 'delete_option' )
				->once()
				->with( $name );

			$options->delete( $name );
		}
	}
}
