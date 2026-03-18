<?php 

require_once __DIR__ . '/../../interfaces/LoginStrategy.php';

class EmailLogin implements LoginStrategy{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(array $data)
    {
        $user = $this->userRepository->findByEmail($data['email']);

        if(!$user){
            throw new Exception("User not found");
        }

        if(!password_verify($data['password'], $user['password'])){
            throw new Exception("Invalid credentials");
        }

        return [
            'status' => 'success',
            'user' => $user
        ];
    }
}

?>