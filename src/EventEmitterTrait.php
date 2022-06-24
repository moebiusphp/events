<?php
namespace Moebius\Events;

use WeakReference;

trait EventEmitterTrait
{
    private array $handlers = [];

    public function on(string $eventName, callable $handler): void {
        $this->handlers[$eventName][] = $handler;
    }

    public function off(string $eventName = null, callable $handler = null): void {
        if ($eventName === null) {
            $this->handlers = [];
            return;
        }
        if (null === $handler) {
            unset($this->handlers[$eventName]);
        } else {
            $this->handlers[$eventName] = array_filter($this->handlers[$eventName] ?? [], static function ($value) use ($handler) {
                return $handler !== $value;
            });
        }
    }

    /**
     * Emit an event
     *
     * @param string $eventName
     * @param EventInterface|object|array $data Arbitrary event data. 
     * @param boolean $cancelable Allow the event to be cancelled by setting the 'cancelled' property to true?
     * @return EventInterface
     */
    public function emit(EventInterface|string $event, mixed ...$arguments): EventInterface {
        if (is_string($event)) {
            $eventName = $event;
            $event = new SimpleEvent($eventName, ...$arguments);
        }

        if (!empty($this->handlers[$event->getName()])) {
            $event->trigger($this->handlers[$event->getName()]);
        }

        return $event;
    }

    public function removeAllListeners(): void {
        $this->handlers = [];
    }
}

