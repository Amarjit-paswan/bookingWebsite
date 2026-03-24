<?php 

class EventDispatcher
{
    private array $listeners = [];

    public function listen(string $eventName, string $listenerClass): void
    {
        $this->listeners[$eventName][] = $listenerClass;
    }

    public function dispatch(EventInterface $event): void
    {
        $eventName = $event->getName();

        if(!isset($this->listeners[$eventName])){
            return;
        }

        foreach($this->listeners[$eventName] as $listenerClass){
            $listener = app()->make($listenerClass);
            $listener->handle($event);
        }
    }
}

?>