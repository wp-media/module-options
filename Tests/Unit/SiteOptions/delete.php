<?php

namespace WPMedia\Options\Tests\Unit\SiteOptions;

use Brain\Monkey\Functions;
use WPMedia\Options\SiteOptions;
use WPMedia\Options\Tests\Unit\TestCase;

/**
 * @covers WPMedia\Options\SiteOptions::delete
 * @group  SiteOptions
 */
class Test_Delete extends TestCase {

	public function testShouldDeletePrefixedOption() {
		$options = new SiteOptions( 'wpmedia_options_' );

		foreach ( [ 'test1', 'test2', 'setting3' ] as $name ) {
			Functions\expect( 'delete_site_option' )
				->once()
				->with( "wpmedia_options_{$name}" );

			$options->delete( $name );
		}
	}

	public function testShouldDeleteNonPrefixedOption() {
		$options = new SiteOptions();

		foreach ( [ 'test1', 'test2', 'setting3' ] as $name ) {
			Functions\expect( 'delete_site_option' )
				->once()
				->with( $name );

			$options->delete( $name );
		}
	}
}
