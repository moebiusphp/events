<?php
namespace Moebius\Events;

use Moebius\Loop;

/**
 * @property string  $type
 * @property bool    $cancelable
 * @property bool    $cancelled
 * @property ?string $targetClass
 */
class SimpleEvent extends Event {
    protected string $name;
    public ?string $targetClass = null;
    protected array $arguments;

    /**
     * Create an event object.
     *
     * @param T $data
     */
    public function __construct(string $name, mixed ...$arguments) {
        $this->name = $name;
        $this->arguments = $arguments;
    }

    public function getName(): string {
        return $this->name;
    }

    public function trigger(array $handlers): void {
        foreach ($handlers as $handler) {
            Loop::queueMicrotask($handler, $this, ...$this->arguments);
        }
    }
}
