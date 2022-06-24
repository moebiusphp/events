<?php
namespace Moebius\Events;

interface EventEmitterInterface
{
    /**
     * Listen to an event listener by class name or event name string
     */
    public function on(string $eventName, callable $handler): void;

    /**
     * Unlisten from an event by class name or event name string.
     */
    public function off(string $eventName = null, callable $handler = null): void;

    /**
     * Emit an event. Accepts either an event object or an event name followed by any number of arguments.
     * Note that only EventInterface objects can be cancelled.
     *
     * @param EventInterface        $event          The event object to emit or event name
     */
    public function emit(EventInterface|string $event, mixed ...$arguments): EventInterface;

    /**
     * Remove all event listeners
     */
    public function removeAllListeners(): void;
}
