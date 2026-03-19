<?php 

class ValidationFactory{

    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function make($type){
        switch ($type){
            case 'email' : 
                return $this->container->make('EmailValidation');
            
            case 'otp' : 
                return $this->container->make('OtpValidation');
            
            default:
                throw new Exception("Invalid validation type");
        }
    }
}

?>