<?php

namespace WPMedia\Options\Tests\Integration\Options;

use WPMedia\Options\Options;
use WPMedia\Options\Tests\Integration\TestCase;

/**
 * @covers WPMedia\Options\Options::delete
 * @group  Options
 */
class Test_Delete extends TestCase {

	public function testShouldDeletePrefixedOption() {
		$options = new Options( 'test_' );

		add_option( 'test_option1', 'some value' );
		$this->assertSame( 'some value', get_option( 'test_option1' ) );
		$options->delete( 'option1' );
		$this->assertFalse( get_option( 'test_option1' ) );

		add_option( 'test_option2', [ 'some value' ] );
		$this->assertSame( [ 'some value' ], get_option( 'test_option2' ) );
		$options->delete( 'option2' );
		$this->assertFalse( get_option( 'test_option2' ) );
	}

	public function testShouldDeleteNonPrefixedOption() {
		$options = new Options();

		add_option( 'test1', 'some value' );
		$this->assertSame( 'some value', get_option( 'test1' ) );
		$options->delete( 'test1' );
		$this->assertFalse( get_option( 'test1' ) );

		add_option( 'test2', [ 'some value' ] );
		$this->assertSame( [ 'some value' ], get_option( 'test2' ) );
		$options->delete( 'test2' );
		$this->assertFalse( get_option( 'test2' ) );
	}
}
