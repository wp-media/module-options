<?php

namespace WPMedia\Options\Tests\Integration\SiteOptions;

use WPMedia\Options\SiteOptions;
use WPMedia\Options\Tests\Integration\TestCase;

/**
 * @covers WPMedia\Options\SiteOptions::delete
 * @group SiteOptions
 */
class Test_Delete extends TestCase {

	public function testShouldDeletePrefixedOption() {
		$options = new SiteOptions( 'test_' );

		add_site_option( 'test_option1', 'some value' );
		$this->assertSame( 'some value', get_site_option( 'test_option1' ) );
		$options->delete( 'option1' );
		$this->assertFalse( get_site_option( 'test_option1' ) );

		add_site_option( 'test_option2', [ 'some value' ] );
		$this->assertSame( [ 'some value' ], get_site_option( 'test_option2' ) );
		$options->delete( 'option2' );
		$this->assertFalse( get_site_option( 'test_option2' ) );
	}

	public function testShouldDeleteNonPrefixedOption() {
		$options = new SiteOptions();

		add_site_option( 'test1', 'some value' );
		$this->assertSame( 'some value', get_site_option( 'test1' ) );
		$options->delete( 'test1' );
		$this->assertFalse( get_site_option( 'test1' ) );

		add_site_option( 'test2', [ 'some value' ] );
		$this->assertSame( [ 'some value' ], get_site_option( 'test2' ) );
		$options->delete( 'test2' );
		$this->assertFalse( get_site_option( 'test2' ) );
	}
}
