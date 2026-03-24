<?php 

class BonusService
{
    public function giveSignupBonus(array $user) : void{
        echo "Signup bonus given user id: ". $user['id'] . PHP_EOL;
    }
}

?>