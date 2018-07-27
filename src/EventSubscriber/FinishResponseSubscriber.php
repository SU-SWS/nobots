<?php
/**
 * Event Subscriber.
 *
 */

use Drupal\Core\EventSubscriber\FinishResponseSubscriber;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

namespace Drupal\nobots\EventSubscriber;

use Drupal\Core\Site\Settings;

/**
 * Response subscriber to handle finished responses.
 */
class FinishResponseSubscriber extends \Drupal\Core\EventSubscriber\FinishResponseSubscriber {

  /**
   * Sets extra headers on successful responses.
   *
   * @param \Symfony\Component\HttpKernel\Event\FilterResponseEvent $event
   *   The event to process.
   */
  public function onRespond(\Symfony\Component\HttpKernel\Event\FilterResponseEvent $event) {
    if (Settings::get('nobots', TRUE)) {
      $response = $event->getResponse();
      $response->headers->set('X-Robots-Tag', 'noindex,nofollow,noarchive', FALSE);
    }
  }

}
