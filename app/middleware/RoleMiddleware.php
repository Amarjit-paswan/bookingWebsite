<?php 

class RoleMiddleware implements MiddlewareInterface{

    protected $requiredRole;

    public function __construct($role)
    {
        $this->requiredRole = $role;
    }

    public function handle($request, $next){

        if(!isset($request['user']['role'])){
            throw new Exception("Unauthorized");
        }

        if($request['user']['role'] !== $this->requiredRole){
            throw new Exception("Forbidden");
        }

        return $next($request);
    }
}

?>