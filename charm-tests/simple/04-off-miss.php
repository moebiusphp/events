<?php
use Moebius\Events\EventEmitter;


$emitter = new EventEmitter();


$emitter->on('test.event', $listener = function($event, ...$args) {
    echo "Good\n";
});

$another = function() {};

$emitter->off('test.event', $another);
$emitter->off(null, $another);

$emitter->emit('test.event', 1, 2, 3, 4);
