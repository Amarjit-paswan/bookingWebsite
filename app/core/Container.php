<?php 

class Container{

    protected $bindings = [];

    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    public function make($class){

        //if manually bound
        if (isset($this->bindings[$class])){
            return $this->bindings[$class]($this);
        }

        // Reflection starts here
        if(!class_exists($class)){
            throw new Exception("Class {$class} does not exist");
        }

        $reflection = new ReflectionClass($class);

        //If no constructor
        if(!$reflection->getConstructor()){
            return new $class;
        }

        $constructor = $reflection->getConstructor();
        $parameters = $constructor->getParameters();

        $dependencies = [];

        foreach($parameters as $param){
            $type = $param->getType();

            if(!$type){
                throw new Exception("Cannot resolve dependency");
            }

            $dependencies[] = $this->make($type->getName());
        }

        return $reflection->newInstanceArgs($dependencies);
    }

}

?>