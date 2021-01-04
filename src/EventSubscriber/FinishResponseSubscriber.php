<?php

namespace Drupal\nobots\EventSubscriber;

use Drupal\Core\State\StateInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Drupal\Core\Site\Settings;

/**
 * Response subscriber to handle finished responses.
 */
class FinishResponseSubscriber implements EventSubscriberInterface {

  /**
   * State service.
   *
   * @var \Drupal\Core\State\StateInterface
   */
  protected $state;

  /**
   * FinishResponseSubscriber constructor.
   *
   * @param \Drupal\Core\State\StateInterface $state
   *   State service.
   */
  public function __construct(StateInterface $state) {
    $this->state = $state;
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[KernelEvents::RESPONSE][] = ['onRespond'];
    return $events;
  }

  /**
   * Sets extra headers on successful responses.
   *
   * @param \Symfony\Component\HttpKernel\Event\ResponseEvent $event
   *   The event to process.
   */
  public function onRespond(ResponseEvent $event) {
    if (Settings::get('nobots', FALSE) || $this->state->get('nobots', FALSE)) {
      $response = $event->getResponse();
      $response->headers->set('X-Robots-Tag', 'noindex,nofollow,noarchive', FALSE);
    }
  }

}
