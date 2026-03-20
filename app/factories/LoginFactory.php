<?php 

class LoginFactory{

    protected $container;
    protected $config;

    public function __construct($container)
    {
        $this->container = $container;
        $this->config = require __DIR__ . '../../../config/stratgies.php';
    }

    public function make($type){

       if(!isset($this->config['login'][$type])){
        throw new Exception("Invalid login type");
       }

       $class = $this->config['login'][$type];

       return $this->container->make($class);
    }

}

?>