<?php

namespace Drupal\Tests\nobots\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Test nobots header when enabled..
 *
 * @package Drupal\Tests\nobots\Unit
 * @group nobots
 */
class NobotsEnabledTest extends BrowserTestBase {

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = ['system', 'nobots'];

  /**
   * Test that the header exists and is correct.
   */
  public function testNobots() {
    $this->drupalGet('<front>');
    $header = $this->getSession()->getResponseHeader('x-robots-tag');
    $this->assertEquals('noindex,nofollow,noarchive', $header);
  }

}
