<?php

namespace WPMedia\Options\Tests\Integration\Options;

use WPMedia\Options\Options;
use WPMedia\Options\Tests\Integration\TestCase;

/**
 * @covers WPMedia\Options\Options::has
 * @group  Options
 */
class Test_Has extends TestCase {
    /**
     * Test should return false when the option doesn't exist
     */
    public function testShouldReturnFalseWhenOptionNotExist() {
        $options = new Options('wp_media_');

        $this->assertFalse($options->has('option'));
    }

    /**
     * Test should return true when the option exists
     */
    public function testShouldReturnTrueWhenOptionExist() {
        add_option('wp_media_option', 'value');

        $options = new Options('wp_media_');

        $this->assertTrue($options->has('option'));

        delete_option('wp_media_option');
    }
}
