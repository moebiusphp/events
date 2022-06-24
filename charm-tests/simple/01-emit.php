<?php
use Moebius\Events\EventEmitter;


$emitter = new EventEmitter();

$emitter->on('test.event', function($event, ...$args) {
    assert(implode("", $args) === '1234', "Incorrect result");
});

$emitter->emit('test.event', 1, 2, 3, 4);
