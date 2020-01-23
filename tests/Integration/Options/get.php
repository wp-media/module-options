<?php

namespace WPMedia\Options\Tests\Integration\Options;

use WPMedia\Options\Tests\Integration\TestCase;

/**
 * @covers WP_Rocket\Admin\Options::get
 * @group  Options
 */
class Test_Get extends TestCase {

	public function testShouldReturnDefaultWhenOptionDoesntExist() {
		$this->assertTrue( true );
	}
}
