<?php 

require_once __DIR__ . '../../factories/LoginFactory.php';
require_once __DIR__ . '../../validators/LoginValidator.php';

class AuthController{

    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function login(){

        $data = json_decode(file_get_contents("php://input"), true);

        $pipeline = new Pipeline();

        return $pipeline->send($data)->through([
            new RateLimitMiddleware(),
            new RoleMiddleware('admin'),
            new AuthMiddleware(), 
        ])
        ->then(function ($request){
            //Validation Strategy
            $validationFactory = new ValidationFactory($this->container);

            $validator = $validationFactory->make($request['type']);

            $validator->validate($request);

            $loginfactory = new LoginFactory($this->container);

            $strategy = $loginfactory->make($request['type']);

            return $strategy->login($request);

            });

        
    }

   
}

?>