<?php 


class AuthService
{
    private $userRepository;

    //Constructor
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    //Register User
    public function register($name, $email, $password)
    {
        // Check if user already exists
        $existingUser = $this->userRepository->findByEmail($email);

        if($existingUser){
            return [
                'success' => false,
                'message' => 'User already exists'
            ];
        }

        //Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        //Save user
        $result = $this->userRepository->createUser($name,$email,$hashedPassword);

        if($result){
            return [
                'success' => true,
                'message' => 'User registered Successfully'
            ];
        }

        return [
            'success' => false,
            'message' => 'Registration failed'
        ];
    }

  
}

?>