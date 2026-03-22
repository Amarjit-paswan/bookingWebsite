<?php 

class RateLimitMiddleware implements MiddlewareInterface{

    protected $limit = 5; //max requests
    protected $timeWindow = 60; //seconds

    public function handle($request, $next){
        session_start();
        $key = 'rate_limit';

        if(!isset($_SESSION[$key])){
            $_SESSION[$key] = [
                'count' => 1,
                'time' => time()
            ];
        }else{
            $elapsed = time() - $_SESSION[$key]['time'];
            if($elapsed < $this->timeWindow){
                $_SESSION[$key]['count']++;

                if($_SESSION[$key]['count'] > $this->limit){
                    throw new Exception("Too many requests");
                }
            }else{
                //reset window
                $_SESSION[$key] = [
                    'count' => 1,
                    'time' => time()
                ];
            }
        }

        return $next($request);
    }
}

?>