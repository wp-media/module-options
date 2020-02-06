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

	public function testShouldReturnFilteredValueWhenPreFiltering() {
		$data    = [
			'test1' => 'some value',
			'test2' => 'off',
			'test3' => 'heya',
		];
		$options = Mockery::mock( OptionArray::class . '[has]', [ $data, 'wpmedia' ] );
		$options->shouldReceive( 'has' )->never();

		foreach ( $data as $key => $value ) {
			$expected = "{$value}_filtered";
			Filters\expectApplied( "wpmedia_pre_get_option_{$key}" )
				->once()
				->with( null, 'default' )
				->andReturn( $expected );

			$this->assertSame( $expected, $options->get( $key, 'default' ) );
		}
	}

	public function testShouldReturnValueWhenExistsAndNoPrefiltering() {
		$data    = [
			'test1' => 'some value',
			'test2' => 'off',
			'test3' => [
				'setting1' => 'some value',
				'setting2' => 1,
			],
		];
		$options = Mockery::mock( OptionArray::class . '[has]', [ $data, 'wpmedia' ] );

		foreach ( $data as $key => $value ) {
			$options->shouldReceive( 'has' )->once()->with( $key )->andReturnTrue();
			$this->assertSame( $value, $options->get( $key, 'default' ) );
		}
	}

	public function testShouldReturnDefaultWhenKeyDoesntExist() {
		$data    = [
			'test1' => 'some value',
			'test2' => 'off',
			'test3' => [
				'setting1' => 'some value',
				'setting2' => 1,
			],
		];
		$options = Mockery::mock( OptionArray::class . '[has]', [ $data, 'wpmedia' ] );

		foreach ( $data as $key => $value ) {
			$options->shouldReceive( 'has' )->once()->with( $key )->andReturnFalse();
			$this->assertSame( 'default', $options->get( $key, 'default' ) );
		}
	}

	public function testShouldReturnFilteredValueWhenPostFiltering() {
		$data    = [
			'test1' => 'some value',
			'test2' => 'off',
			'test3' => 'heya',
		];
		$options = new OptionArray( $data, 'wpmedia' );

		foreach ( $data as $key => $value ) {
			Filters\expectApplied( "wpmedia_get_option_{$key}" )
				->once()
				->with( $value, 'default' )
				->andReturn( $key );

			$this->assertSame( $key, $options->get( $key, 'default' ) );
		}
	}
}
