<?php
namespace Moebius\Events;

use Moebius\Loop;

/**
 * @property string  $type
 * @property bool    $cancelable
 * @property bool    $cancelled
 * @property ?string $targetClass
 */
abstract class Event implements EventInterface {
    public ?string $targetClass = null;

    abstract public function getName(): string;

    public function trigger(array $handlers): void {
        foreach ($handlers as $handler) {
            Loop::queueMicrotask($handler, $this);
        }
    }
}
