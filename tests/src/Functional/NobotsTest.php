<?php

namespace Drupal\Tests\nobots\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Test nobots header when disabled.
 *
 * @package Drupal\Tests\nobots\Unit
 * @group nobots
 */
class NobotsTest extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = ['system', 'nobots'];

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stable';

  /**
   * Test that the header does not exist.
   */
  public function testNobots() {
    $this->drupalGet('<front>');
    $header = $this->getSession()->getResponseHeader('x-robots-tag');
    $this->assertEquals('', $header);

    \Drupal::state()->set('nobots', TRUE);
    $this->drupalGet('<front>');
    $header = $this->getSession()->getResponseHeader('x-robots-tag');
    $this->assertEquals('noindex,nofollow,noarchive', $header);
  }

}
