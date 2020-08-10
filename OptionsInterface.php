<?php

namespace WPMedia\Options;

/**
 * Define mandatory methods to implement when using this package
 */
interface OptionsInterface {
	/**
	 * Gets the option name used to store the option in the WordPress database.
	 *
	 * @param string $name Unprefixed name of the option.
	 *
	 * @return string Option name used to store it
	 */
	public function get_option_name( $name);

	/**
	 * Gets the option for the given name. Returns the default value if the value does not exist.
	 *
	 * @param string $name   Name of the option to get.
	 * @param mixed  $default Default value to return if the value does not exist.
	 *
	 * @return mixed
	 */
	public function get( $name, $default = null );

	/**
	 * Sets the value of an option. Update the value if the option for the given name already exists.
	 *
	 * @param string $name Name of the option to set.
	 * @param mixed  $value Value to set for the option.
	 *
	 * @return void
	 */
	public function set( $name, $value );

	/**
	 * Deletes the option with the given name.
	 *
	 * @param string $name Name of the option to delete.
	 *
	 * @return void
	 */
	public function delete( $name );

	/**
	 * Checks if the option with the given name exists.
	 *
	 * @param string $name Name of the option to check.
	 *
	 * @return boolean True if the option exists, false otherwise
	 */
	public function has( $name );
}
