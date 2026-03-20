<?php 

require_once __DIR__ . '/../interfaces/MiddlewareInterface.php';

class AuthMiddleware implements MiddlewareInterface {

    public function handle($request, $next){
        if(!isset($request['user'])){
            throw new Exception("Unauthorized");
        }

        return $next($request);
    }
}


?>