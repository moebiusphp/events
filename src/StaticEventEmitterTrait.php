<?php
namespace Moebius\Events;

/**
 * Attach this trait to classes that should emit class level events. Listeners
 * can attach using `ClassName::events()->on('event_name', $listener)`.
 * 
 * Note that events from `SuperClass::emit()` will not be captured by listeners
 * on `ChildClass` and vice versa.
 */
trait StaticEventEmitterTrait {
    private static array $_eventEmitters = [];

    /**
     * A class level event dispatcher, for example to listen for events relating to
     * all instances of a given type.
     *
     * @return EventEmitterInterface
     */
    public static final function events(): EventEmitterInterface {
        //var_dump(get_class(), , get_called_class(), "<br><br>");
        //$className = get_class();
        if (isset(static::$_eventEmitters[static::class])) {
            return static::$_eventEmitters[static::class];
        }

        return static::$_eventEmitters[static::class] = new StaticEventEmitter(static::class, static::$_eventEmitters);
    }
}
