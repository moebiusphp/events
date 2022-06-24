Moebius\Events
==============

A simple event emitter implementation for Moebius. Provides interfaces and traits for
event emitters.


Listener API
------------

 * `EventEmitterInterface::on( string $eventName, callable $handler )`
   Subscribe to an event.

 * `EventEmitterInterface::off( string $eventName = null, callable $handler = null )`
   Unsubscribe from an event.
   
 * `EventEmitterInterface::emit( EventInterface|string $eventName, mixed ...$arguments)`
   Emit an event. You can emit either an EventInterface object, or a named event with
   any number of argumnents.


Static Event Emitters
---------------------

In some circumstances you want to subscribe to events from objects that don't exist
yet. This is enabled by the static event emitter.

 * `StaticEventEmitterInterface::events(): EventEmitterInterface`

This particular event emitter will take into account which class you're subscribed to,
in the PHP class hierarchy. So if you subscribe to a root class, you will receive events
from all extending classes that emit events as well. If you subscribe to a child class,
you will not receive events emitted higher up in the class hierarchy.


