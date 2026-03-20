<?php 

require_once 'AppException.php';

class ValidationException extends AppException{

    public function __construct($message = "Validation Error"){
        parent::__construct($message, 422);
    }

}

?>