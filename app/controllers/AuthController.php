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

        $validator = $this->container->make('LoginValidator');

        $validator->validate($_POST);

        $type = $_POST['type'] ?? 'email';

        $factory = new LoginFactory($this->container);

        $strategy = $factory->make($type);


        $result = $strategy->login($_POST);

        echo json_encode($result);
    }
}

?>