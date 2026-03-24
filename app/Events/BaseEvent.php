<?php 

abstract class BaseEvent implements EventInterface
{
    protected string $name;

    public function getName(): string
    {
        return $this->name;
    }
}

?>