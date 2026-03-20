<?php 

class Pipeline{

    protected $middleware = [];

    public function send($request){
        return $this;
    }

    public function through($middlewares){
        $this->middleware = $middlewares;
        return $this;
    }

    public function then($destination){
        $pipeline = array_reduce(
            array_reverse($this->middleware),
            function ($next, $middleware){
                return function ($request) use ($middleware, $next){
                    return $middleware->handle($request, $next);
                };
            },
            $destination
        );

        return $pipeline([]);
    }

}

?>