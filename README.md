# Option Package
This package is a wrapper to make it easier to work with the WordPress Options API.

## Installation
Using composer:

`composer require wp-media/options`

## Description
This package contains the following:

* __OptionsInterface__: Interface defining the mandatory methods to implement
* __AbstractOptions__: Abstract class implementing `OptionsInterface`, with get/set/delete abstract methods
* __Options__: Class extending `AbstractOptions` for single site options
* __SiteOptions__: Class extending `AbstractOptions` for multisite options
* __OptionArray__: Class to manage array data coming from an option

## Usage Examples
### For single site option
```php
use WPMedia\Options;

$option = new Options( 'wp_media_' ); // optional prefix

$option->get( 'setting' );

```

### For multisite option
```php
use WPMedia\SiteOptions;

$option = new SiteOptions( 'wp_media_' ); // optional prefix

$option->get( 'setting' );
```

### For option containing an array
```php
use WPMedia\Options;
use WPMedia\OptionArray;

$option = new Options( 'wp_media_' ); // optional prefix

$data = new OptionArray( $option->get( 'setting' ), 'wpmedia' );

$data->get( 'setting_key' );
```