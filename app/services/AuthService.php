<?php 

//Include UserRepository
require_once '../app/repositories/UserRepository.php';

class AuthService
{
    private $userRepository;

    //Constructor
    public function __construct()
    {
        $this->userRepository = new UserRepository();
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

    //Login User
    public function login($email, $password)
    {
        //Find User
        $user = $this->userRepository->findByEmail($email);

        if(!$user){
            return [
                'success' => false,
                'message' => 'User not found'
            ];
        }

        //Verify Password
        if(!password_verify($password, $user['password'])){
            return [
                'success' => false,
                'message' => 'Invalid Password'
            ];
        }

        //Success
        return [
            'success' => true,
            'message' => 'Login Successfully',
            'user' => $user
        ];
    }
}

?>