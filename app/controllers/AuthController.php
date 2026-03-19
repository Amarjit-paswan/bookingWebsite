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

        $type = $data['type'] ?? 'email';

        //Validation Strategy
        $validationFactory = new ValidationFactory($this->container);

        $validator = $validationFactory->make($type);

        $validator->validate($data);

        $loginfactory = new LoginFactory($this->container);

        $strategy = $loginfactory->make($type);

        $result = $strategy->login($_POST);

        echo json_encode($result);
    }
}

?>