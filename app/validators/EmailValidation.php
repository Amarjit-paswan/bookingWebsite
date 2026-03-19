<?php 

require_once __DIR__ . '/../interfaces/ValidationStrategy.php';

class EmailValidation implements Validationstrategy{

    public function validate(array $data){

        if(empty($data['email'])){
            throw new Exception("Email is required");
        }

        if(empty($data['password'])){
            throw new Exception("Password is required");
        }

        return true;
    }

}

?>