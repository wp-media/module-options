<?php

namespace WPMedia\Options\Tests\Unit\Options;

use Brain\Monkey\Functions;
use WPMedia\Options\Options;
use WPMedia\Options\Tests\Unit\TestCase;

/**
 * @covers WPMedia\Options\Options::has
 * @group Options
 */
class Test_Has extends TestCase {

    public function testShouldReturnFalseWhenOptionNotExist() {
        Functions\expect('get_option')
        ->once()
        ->with('wp_media_option', null)
        ->andReturn(null);

        $options = new Options('wp_media_');

        $this->assertFalse($options->has('option'));
    }

    public function testShouldReturnTrueWhenOptionExist() {
        Functions\expect('get_option')
        ->once()
        ->with('wp_media_option', null)
        ->andReturn('value');

        $options = new Options('wp_media_');

        $this->assertTrue($options->has('option'));
    }
}
