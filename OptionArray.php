<?php
namespace WPMedia\Options;

use ArrayAccess;

/**
 * Manages the array data coming from an option.
 *
 * @since 3.0
 * @author Remy Perona
 */
class OptionArray implements ArrayAccess {
	/**
	 * Array of data coming from an option
	 *
	 * @var array
	 */
	private $options;

	/**
	 * Slug used for the option name.
	 *
	 * @var string
	 */
	private $slug;

	/**
	 * Constructor
	 *
	 * @param array  $options Array of data coming from an option.
	 * @param string $slug    Slug used for the option name.
	 */
	public function __construct( $options, $slug ) {
		$this->options = $options;
		$this->slug    = $slug;
	}

	/**
	 * Checks if the provided key exists in the option data array.
	 *
	 * @since 3.0
	 * @author Remy Perona
	 *
	 * @param string $key key name.
	 * @return boolean true if it exists, false otherwise
	 */
	public function has( $key ) {
		return isset( $this->options[ $key ] );
	}

	/**
	 * Gets the value associated with a specific key.
	 *
	 * @since 3.0
	 * @author Remy Perona
	 *
	 * @param string $key key name.
	 * @param mixed  $default default value to return if key doesn't exist.
	 * @return mixed
	 */
	public function get( $key, $default = '' ) {
		/**
		 * Pre-filter any option before read
		 *
		 * @since 2.5
		 *
		 * @param mixed $default The default value.
		*/
		$value = apply_filters( $this->slug . '_pre_get_option_' . $key, null, $default ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals

		if ( null !== $value ) {
			return $value;
		}

		if ( ! $this->has( $key ) ) {
			return $default;
		}

		/**
		 * Filter any option after read
		 *
		 * @since 2.5
		 *
		 * @param mixed $value   The value associated with the provided key.
		 * @param mixed $default The default value.
		*/
		return apply_filters( $this->slug . '_get_option_' . $key, $this->options[ $key ], $default ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals
	}

	/**
	 * Sets the value associated with a specific key.
	 *
	 * @since 3.0
	 * @author Remy Perona
	 *
	 * @param string $key key name.
	 * @param mixed  $value to set.
	 * @return void
	 */
	public function set( $key, $value ) {
		$this->options[ $key ] = $value;
	}

	/**
	 * Sets multiple values.
	 *
	 * @since 3.0
	 * @author Remy Perona
	 *
	 * @param array $options An array of key/value pairs to set.
	 * @return void
	 */
	public function set_values( $options ) {
		foreach ( $options as $key => $value ) {
			$this->set( $key, $value );
		}
	}

	/**
	 * Gets the option array.
	 *
	 * @since 3.0
	 * @author Remy Perona
	 *
	 * @return array
	 */
	public function get_options() {
		return $this->options;
	}

	/**
	 * Whether an offset exists
	 *
	 * @param mixed $offset An offset to check for.
	 * @return bool
	 */
	public function offsetExists( $offset ) {
		return $this->has( $offset );
	}

	/**
	 * Offset to retrieve
	 *
	 * @param mixed $offset The offset to retrieve.
	 * @return mixed
	 */
	public function offsetGet( $offset ) {
		return $this->get( $offset );
	}

	/**
	 * Assign a value to the specified offset
	 *
	 * @param mixed $offset The offset to assign the value to.
	 * @param mixed $value The value to set.
	 * @return void
	 */
	public function offsetSet( $offset, $value ) {
		$this->set( $offset, $value );
	}

	/**
	 * Unset an offset
	 *
	 * @param mixed $offset The offset to unset.
	 * @return void
	 */
	public function offsetUnset( $offset ) {
		unset( $this->options[ $offset ] );
	}
}
