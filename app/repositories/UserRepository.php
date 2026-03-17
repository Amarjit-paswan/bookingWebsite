<?php 

//Include Database Class
require_once '../app/core/Database.php';

class UserRepository
{
    private $connection;

    //Constructor: recevies database and store connection
    public function __construct()
    {
        $db = new Database();
        $this->connection = $db->getConnection();
    }

    //Create a new user
    public function createUser($name, $email, $password)
    {
        //SQL Query
        $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";

        //Prepare Statment
        $stmt = $this->connection->prepare($sql);

        //Execute with values
        return $stmt->execute([$name,$email,$password]);
    }

    //Find User by email
    public function findByEmail($email)
    {
        //SQL Query
        $sql = "SELECT * FROM users WHERE email = ? LIMIT 1";

        //Prepare Statement
        $stmt = $this->connection->prepare($sql);

        //Execute query
        $stmt->execute([$email]);

        //Fetch single result
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>