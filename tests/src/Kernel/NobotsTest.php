<?php

namespace Drupal\Tests\nobots\Kernel;

use Drupal\KernelTests\KernelTestBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Nobots tests.
 *
 * @coversDefaultClass \Drupal\nobots\EventSubscriber\FinishResponseSubscriber
 */
class NobotsTest extends KernelTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = ['system', 'nobots'];

  /**
   * Test kernel event subscriber.
   */
  public function testKernelEvent() {
    $request = new Request();
    $response = new Response();

    $event = new ResponseEvent(
      $this->createMock(HttpKernelInterface::class),
      $request,
      HttpKernelInterface::MASTER_REQUEST,
      $response
    );

    /** @var \Symfony\Component\EventDispatcher\EventDispatcherInterface $event_dispatcher */
    $event_dispatcher = \Drupal::service('event_dispatcher');
    $event_dispatcher->dispatch($event, KernelEvents::RESPONSE);

    $this->assertEmpty($event->getResponse()->headers->get('X-Robots-Tag'));
    \Drupal::state()->set('nobots',true);

    $event_dispatcher->dispatch($event, KernelEvents::RESPONSE);
    $this->assertNotEmpty($event->getResponse()->headers->get('X-Robots-Tag'));
  }

}
