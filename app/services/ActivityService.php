<?php 

class ActivityService
{
    public function log(array $user): void
    {
        echo "User activity logged for: ". $user['email']. PHP_EOL;
    }
}


?>