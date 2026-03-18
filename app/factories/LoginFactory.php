<?php 

class LoginFactory{

    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function make($type){

        switch ($type){
            case 'email' : 
                return $this->container->make('EmailLogin');
            
            case 'otp' : 
                return $this->container->make('OtpLogin');
            
            default: 
                throw new Exception("Invalid login type");
        }
    }

}

?>