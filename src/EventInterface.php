<?php
declare(strict_types=1);

namespace Moebius\Events;

interface EventInterface {
    /**
     * Return the name which is used to subscribe to this event
     */
    public function getName(): string;

    /**
     * Queue microtasks for all event listeners provided. The
     * listeners must be invoked with this object as the first
     * argument, followed by any number of arguments depending
     * on your use case.
     */
    public function trigger(array $listeners): void;
}
