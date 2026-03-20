<?php 

class ValidationFactory{

    protected $container;
    protected $config;

    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->config = require __DIR__ . '/../../config/stratgies.php';
    }

    public function make($type){
        
        if(!isset($this->config['validation'][$type])){
            throw new Exception("Invalid validation type");
        }

        $class = $this->config['validation'][$type];

        return $this->container->make($class);
    }
}

?>