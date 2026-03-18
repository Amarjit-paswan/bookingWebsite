<?php 

class Container{

    protected $bindings = [];

    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    public function make($key){

        if(!isset($this->bindings[$key])){
            throw new Exception("No bindings found for {$key}");
        }

        return $this->bindings[$key]($this);
    }

}

?>