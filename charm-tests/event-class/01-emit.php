<?php
use Moebius\Events\EventEmitter;
use Moebius\Events\Event;

class SomeEvent extends Event {
    public function getName(): string {
        return 'some-event';
    }

    public function __construct(
        public readonly string $data
    ) {}
}

$emitter = new EventEmitter();

$emitter->on('some-event', function($event) {
    assert($event->data === 'Hello World!', "Didn't get the right stuff");
});

$emitter->emit(new SomeEvent('Hello World!'));
