<?php 

class UserRegisteredEvent extends BaseEvent
{
    public function __construct(public array $user)
    {
        $this->name = 'user.registered';
    }
}

?>