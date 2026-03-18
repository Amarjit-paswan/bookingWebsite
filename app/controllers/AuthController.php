<?php 

require_once __DIR__ . '../../factories/LoginFactory.php';

class AuthController{

    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function login(){

        $type = $_POST['type'] ?? 'email';

        $factory = new LoginFactory($this->container);

        $strategy = $factory->make($type);

        $authService = new AuthService($strategy);

        $result = $authService->login($_POST);

        print_r($result);
    }
}

?>