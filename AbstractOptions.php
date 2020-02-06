<?php

namespace WPMedia\Options;

/**
 * Abstract class implementing OptionsInterface mandatory methods.
 *
 * @author Remy Perona
 */
abstract class AbstractOptions implements OptionsInterface {

	/**
	 * The prefix used by options.
	 *
	 * @author Remy Perona
	 *
	 * @var string
	 */
	protected $prefix;

	/**
	 * Gets the option name used to store the option in the WordPress database.
	 *
	 * @author Remy Perona
	 *
	 * @param string $name Unprefixed name of the option.
	 *
	 * @return string Option name used to store it
	 */
	public function getOptionName( $name ) {
		return $this->prefix . $name;
	}

	/**
	 * Gets the option for the given name. Returns the default value if the value does not exist.
	 *
	 * @author Remy Perona
	 *
	 * @param string $name   Name of the option to get.
	 * @param mixed  $default Default value to return if the value does not exist.
	 *
	 * @return mixed
	 */
	abstract public function get( $name, $default = null );

	/**
	 * Sets the value of an option. Update the value if the option for the given name already exists.
	 *
	 * @author Remy Perona
	 * @param string $name Name of the option to set.
	 * @param mixed  $value Value to set for the option.
	 *
	 * @return void
	 */
	abstract public function set( $name, $value );

	/**
	 * Deletes the option with the given name.
	 *
	 * @author Remy Perona
	 *
	 * @param string $name Name of the option to delete.
	 *
	 * @return void
	 */
	abstract public function delete( $name );

	/**
	 * Checks if the option with the given name exists.
	 *
	 * @author Remy Perona
	 *
	 * @param string $name Name of the option to check.
	 *
	 * @return boolean True if the option exists, false otherwise
	 */
	public function has( $name ) {
		return null !== $this->get( $name );
	}
}
