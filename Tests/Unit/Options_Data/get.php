<?php

namespace WPMedia\Options\Tests\Unit\Options_Data;

use Brain\Monkey\Filters;
use Mockery;
use WP_Rocket\Admin\Options_Data;
use WPMedia\Options\Tests\Unit\TestCase;

/**
 * @covers WP_Rocket\Admin\Options_Data::get
 * @group  OptionsData
 */
class Test_Get extends TestCase {

	public function testShouldReturnFilteredValueWhenPreFiltering() {
		$data    = [
			'test1' => 'some value',
			'test2' => 'off',
			'test3' => 'heya',
		];
		$options = Mockery::mock( Options_Data::class . '[has]', [ $data ] );
		$options->shouldReceive( 'has' )->never();

		foreach ( $data as $key => $value ) {
			$expected = "{$value}_filtered";
			Filters\expectApplied( "pre_get_rocket_option_{$key}" )
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
		$options = Mockery::mock( Options_Data::class . '[has]', [ $data ] );

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
		$options = Mockery::mock( Options_Data::class . '[has]', [ $data ] );

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
		$options = new Options_Data( $data );

		foreach ( $data as $key => $value ) {
			Filters\expectApplied( "get_rocket_option_{$key}" )
				->once()
				->with( $value, 'default' )
				->andReturn( $key );

			$this->assertSame( $key, $options->get( $key, 'default' ) );
		}
	}
}
