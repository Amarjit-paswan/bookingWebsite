<?php 

class ExceptionHandler{

public static function handle($exception){

    $statusCode = method_exists($exception, 'getStatusCode') ? $exception->getStatusCode() : 500;

    http_response_code(400);

    echo json_encode([
        'status' => 'error',
        'message' => $exception->getMessage(),
        'code' => $exception->getCode()
    ]);
}

}

?>