<?php 

interface ListenerInterface
{
    public function handle(EventInterface $event) : void;
}

?>