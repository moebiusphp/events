<?php
namespace Moebius\Events;

interface StaticEventEmitterInterface {

    /**
     * Listen to events on a class level. Note that child classes
     * should not implement the StaticEventEmitterTrait themselves,
     * as this would effectively stop events from reaching all event
     * listeners.
     *
     * @return EventEmitterInterface
     */
    public static function events(): EventEmitterInterface;

}
