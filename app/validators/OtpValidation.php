<?php 

require_once __DIR__ . '/../interfaces/ValidationStrategy.php';

class OtpValidation implements Validationstrategy {

    public function validate(array $data){

        if(empty($data['otp'])){
            throw new Exception("OTP is required");
        }

        return true;
    }
}

?>