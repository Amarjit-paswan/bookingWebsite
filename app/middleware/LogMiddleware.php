<?php 

class LogMiddleware implements MiddlewareInterface{

    public function handle($request, $next)
    {
        error_log("Request received");

        return $next($request);
    }
}

?>