<?php 

require_once __DIR__ . '../../interfaces/ValidatorInterface.php';

class LoginValidator implements ValidatorInterface {

    public function validate(array $data)
    {
        if(empty($data['type'])){
            throw new Exception("Login type is required");
        }

        if($data['type'] === 'email'){

            if(empty($data['type'])){
                throw new Exception("Email is required");
            }

            if(empty($data['password'])){
                throw new Exception("Password is required");
            }
        }

        if($data['type'] === 'otp'){

            if(empty($data['otp'])){
                throw new Exception("OTP is required");
            }
        }

        return true;
    }


}

?>