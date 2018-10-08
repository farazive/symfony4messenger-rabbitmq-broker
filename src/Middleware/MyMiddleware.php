<?php
namespace App\Middleware;

use Symfony\Component\Messenger\Asynchronous\Transport\ReceivedMessage;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Middleware\MiddlewareInterface;
use Symfony\Component\Messenger\EnvelopeAwareInterface;

/**
 * Class MyMiddleware
 * @package App\Middleware
 */
class MyMiddleware implements MiddlewareInterface, EnvelopeAwareInterface
{
    /**
     * @param object $envelope
     * @param callable $next
     *
     * @return mixed
     */
    public function handle($envelope, callable $next)
    {
        // $envelope here is an `Envelope` object, because this middleware
        // implements the EnvelopeAwareInterface interface.

        if (null !== $envelope->get(ReceivedMessage::class)) {
            // Message just has been received...

            // You could for example add another item.
            /** @var Envelope $envelope */
            //$envelope = $envelope->with(new AnotherEnvelopeItem(/* ... */));
        }

        return $next($envelope);
    }
}