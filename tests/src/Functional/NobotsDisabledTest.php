<?php

namespace Drupal\Tests\nobots\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Test nobots header when disabled.
 *
 * @package Drupal\Tests\nobots\Unit
 * @group nobots
 */
class NobotsDisabledTest extends BrowserTestBase {

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = ['system'];

  /**
   * Test that the header does not exist.
   */
  public function testNobots() {
    $this->drupalGet('<front>');
    $header = $this->getSession()->getResponseHeader('x-robots-tag');
    $this->assertEquals('', $header);
  }

}
