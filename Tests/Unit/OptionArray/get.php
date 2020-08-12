<?php

namespace WPMedia\Options\Tests\Unit\OptionArray;

use Brain\Monkey\Filters;
use Mockery;
use WPMedia\Options\OptionArray;
use WPMedia\Options\Tests\Unit\TestCase;

/**
 * @covers WPMedia\Options\OptionArray::get
 * @group  OptionArray
 */
class Test_Get extends TestCase {
	/**
	 * @dataProvider configTestData
	 *
	 * @return void
	 */
	public function testShouldReturnExpectedValue( $option, $key, $config, $expected ) {
		$options = Mockery::mock( OptionArray::class . '[has]', [ $option, 'wpmedia' ] );

		if ( isset( $config['pre'] ) ) {
			$options->shouldReceive( 'has' )->never();

			Filters\expectApplied( "wpmedia_pre_get_option_{$key}" )
				->once()
				->with( null, 'default' )
				->andReturn( $config['pre'] );
		} else {
			$options->shouldReceive( 'has' )
				->once()
				->with( $key )
				->andReturn( $config[ 'exists' ] );
		}

		if ( isset( $config['post'] ) ) {
			Filters\expectApplied( "wpmedia_get_option_{$key}" )
				->once()
				->with( $option[ $key ], 'default' )
				->andReturn( $config['post'] );
		}

		$this->assertSame(
			$expected,
			$options->get( $key, 'default' )
		);
	}
}
