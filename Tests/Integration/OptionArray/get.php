<?php

namespace WPMedia\Options\Tests\Integration\OptionArray;

use WPMedia\Options\OptionArray;
use WPMedia\Options\Tests\Integration\TestCase;

/**
 * @covers WPMedia\Options\OptionArray::get
 * @group  OptionArray
 */
class Test_Get extends TestCase {
	private $pre_value;
	private $post_value;

	public function tearDown() {
		parent::tearDown();

		delete_option( 'wpmedia' );
	}

	/**
	 * @dataProvider configTestData
	 */
	public function testShouldReturnExpectedValue( $option, $key, $config, $expected ) {
		add_option( 'wpmedia', $option );

		$options = new OptionArray( $option, 'wpmedia' );

		if ( isset( $config['pre'] ) ) {
			$this->pre_value = $config['pre'];

			add_filter( "wpmedia_pre_get_option_{$key}", [ $this, 'set_pre_value' ] );
		}

		if ( isset( $config['post'] ) ) {
			$this->post_value = $config['post'];

			add_filter( "wpmedia_get_option_{$key}", [ $this, 'set_post_value' ] );
		}

		$this->assertSame(
			$expected,
			$options->get( $key, 'default' )
		);

		remove_filter( "wpmedia_pre_get_option_{$key}", [ $this, 'set_pre_value' ] );
		remove_filter( "wpmedia_get_option_{$key}", [ $this, 'set_post_value' ] );
	}

	public function set_pre_value() {
		return $this->pre_value;
	}

	public function set_post_value() {
		return $this->post_value;
	}
}
