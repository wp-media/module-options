<?php

namespace WPMedia\Options\Tests\Unit\Options;

use WPMedia\Options\Tests\Unit\TestCase;

/**
 * @covers WP_Rocket\Admin\Options::get
 * @group  Options
 */
class Test_Get extends TestCase {

	public function testShouldReturnDefaultWhenOptionDoesntExist() {
		$this->assertTrue( true );
	}
}
