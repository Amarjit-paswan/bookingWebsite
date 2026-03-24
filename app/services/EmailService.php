<?php 

class EmailService
{
    public function sendWelcome(array $user): void
    {
        //simulate sending email
        echo "Email sent to: ". $user['email']. PHP_EOL;
    }
}

?>