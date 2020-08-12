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
	 * @dataProvider configTestData
	 */
    public function testShouldReturnExpected( $option ) {
        if ( false !== $option['value'] ) {
            add_option( $option['name'], $option['value'] );
        }

        $options = new Options( $option['name'] );

        if ( false !== $option['value'] ) {
            $this->assertTrue( $options->has( $option['name'] ) );
        } else {
            $this->assertFalse( $options->has( $option['name'] ) );
        }

        delete_option( 'rocket' );
    }
}
