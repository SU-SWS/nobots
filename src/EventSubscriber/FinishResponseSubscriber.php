<?php
/**
 * Event Subscriber.
 *
 */

use Drupal\Core\EventSubscriber\FinishResponseSubscriber;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

namespace Drupal\nobots\EventSubscriber;

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
    $request = $event->getRequest();
    $response = $event->getResponse();
    $response->headers->set('X-Robots-Tag', 'noindex,nofollow,noarchive', FALSE);
  }

}
