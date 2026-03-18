<?php 

require_once __DIR__ . '../../../interfaces/LoginStrategy.php';

class OtpLogin implements LoginStrategy{

    public function login(array $data){

        if($data['otp'] !== '1234'){
            throw new Exception("Invalid OTP");
        }

        return [
            'status' => 'success',
            'message' => 'OTP login success'
        ];
    }
}

?>