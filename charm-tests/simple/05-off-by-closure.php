<?php
use Moebius\Events\EventEmitter;


$emitter = new EventEmitter();


$emitter->on('test.event', $listener = function($event, ...$args) {
    assert(false, "This should be off");
});

$emitter->off(null, $listener);

$emitter->emit('test.event', 1, 2, 3, 4);
