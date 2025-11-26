<?php
declare(strict_types=1);

namespace WPMedia\Options\Tests\Integration\OptionArray;

use WPMedia\Options\OptionArray;
use WPMedia\Options\Tests\Integration\TestCase;

/**
 * @covers WPMedia\Options\OptionArray::get
 * @group  OptionArray
 */
class GetTest extends TestCase {
	/**
	 * Pre-value for the option.
	 *
	 * @var mixed
	 */
	private $pre_value;

	/**
	 * Post-value for the option.
	 *
	 * @var mixed
	 */
	private $post_value;

	/**
	 * Clean up after tests.
	 */
	public function tear_down() {
		delete_option( 'wpmedia' );

		parent::tear_down();
	}

	/**
	 * @dataProvider configTestData
	 *
	 * @param array<string, mixed> $option   Option values.
	 * @param string               $key      Key to get.
	 * @param array<string, mixed> $config   Config for pre and post filters.
	 * @param mixed                $expected Expected value.
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

	/**
	 * Set the pre value for the option.
	 *
	 * @return mixed
	 */
	public function set_pre_value() {
		return $this->pre_value;
	}

	/**
	 * Set the post value for the option.
	 *
	 * @return mixed
	 */
	public function set_post_value() {
		return $this->post_value;
	}
}
