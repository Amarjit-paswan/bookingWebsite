<?php 

class Database
{

    private $connection;

    public function __construct()
    {
        //Load config
        $config = require '../config/database.php';

        //Create DSN
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']}";

        try{
            //Create PDO connection
            $this->connection = new PDO($dsn, $config['username'], $config['password']);

            //Set error mode
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){

            //Handle connection error
            die("Database connection failed: ". $e->getMessage());
        }
    }

    //Return connection
    public function getConnection(){
        return $this->connection;
    }

    //Transaction methods
    public function beginTransaction(){
        $this->connection->beginTransaction();
    }

    public function commit(){
        $this->connection->commit();
    }

    public function rollback(){
        $this->connection->rollback();
    }
}


?>