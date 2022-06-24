<?php
use Moebius\Events\EventEmitter;


$emitter = new EventEmitter();

$emitter->on('test.event', $listener = function($event, ...$args) {
    assert(false, "Not expecting this event listener to be triggered");
});

$emitter->off('test.event', $listener);


$emitter->emit('test.event', 1, 2, 3, 4);
