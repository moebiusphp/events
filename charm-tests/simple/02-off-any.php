<?php
use Moebius\Events\EventEmitter;


$emitter = new EventEmitter();

$emitter->on('test.event', function($event, ...$args) {
    assert(false, "Not expecting this event listener to be triggered");
});

$emitter->off('test.event');


$emitter->emit('test.event', 1, 2, 3, 4);
