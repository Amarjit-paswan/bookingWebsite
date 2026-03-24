<?php 

class EventServiceProvider
{
    public function __construct(private EventDispatcher $dispatcher) {}
    
    public function register(): void
    {
        $events = require __DIR__ . '../../../config/events.php';

        foreach($events as $events => $listeners){
            foreach($listeners as $listener){
                $this->dispatcher->listen($event, $listener);
            }
        }
    }
}

?>