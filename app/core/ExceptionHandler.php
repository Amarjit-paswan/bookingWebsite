<?php 

class ExceptionHandler{

public static function handle($exception){

    http_response_code(400);

    echo json_encode([
        'status' => 'error',
        'message' => $exception->getMessage(),
        'code' => $exception->getCode()
    ]);
}

}

?>