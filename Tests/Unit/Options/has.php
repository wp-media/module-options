<?php

namespace WPMedia\Options\Tests\Unit\Options;

use Brain\Monkey\Functions;
use WPMedia\Options\Options;
use WPMedia\Options\Tests\Unit\TestCase;

/**
 * @covers WPMedia\Options\Options::has
 * @group Options
 */
class Test_Has extends TestCase {
	/**
	 * @dataProvider configTestData
	 */
	public function testShouldReturnExpected( $option ) {
		$options = new Options();

		if ( false === $option['value'] ) {
			Functions\expect( 'get_option' )
			->once()
			->with( $option['name'], null )
			->andReturn( null );

			$this->assertFalse( $options->has( $option['name'] ) );
		} else {
			Functions\expect( 'get_option' )
			->once()
			->with( $option['name'], null )
			->andReturn( $option['value'] );

			$this->assertTrue( $options->has( $option['name'] ) );
		}
	}
}
