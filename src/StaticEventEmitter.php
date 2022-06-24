<?php
namespace Moebius\Events;

/**
 * This class is intended to be used as a static event source
 * for classes via the {@see StaticEventEmitterTrait}.
 */
class StaticEventEmitter implements EventEmitterInterface
{
    use EventEmitterTrait {
        emit as EventEmitterTrait__emit;
    }

    private string $targetClass;
    private array $otherEventEmitters;

    public function __construct(string $targetClass, array &$otherEventEmitters)
    {
        $this->targetClass = $targetClass;
        $this->otherEventEmitters = &$otherEventEmitters;
    }

    /**
     * Emit an event.
     *
     * @param EventInterface|object $event      arbitrary event data
     * @param bool                  $cancelable Allow the event to be cancelled by setting the 'cancelled' property to true?
     */
    public function emit(string $eventName, object $event, bool $cancelable = true): EventInterface
    {
        if (!($event instanceof EventInterface)) {
            $event = new Event($eventName, $event, $cancelable);
        }

        if (!isset($event->targetClass)) {
            $event->targetClass = $this->targetClass;
        }

        $this->EventEmitterTrait__emit($eventName, $event, $cancelable);

        foreach (class_parents($this->targetClass) as $otherTarget) {
            if (isset($this->otherEventEmitters[$otherTarget])) {
                $this->otherEventEmitters[$otherTarget]->EventEmitterTrait__emit($eventName, $event, $cancelable);
            }
        }

        return $event;
    }
}
