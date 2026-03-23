<?php 


require_once  __DIR__ . '../../app/core/Container.php';
require_once  __DIR__ . '../../app/repositories/UserRepository.php';
require_once  __DIR__ . '../../app/services/Login/EmailLogin.php';
require_once  __DIR__ . '../../app/services/Login/OtpLogin.php';
require_once  __DIR__ . '../../app/services/AuthService.php';

require_once __DIR__ . '../../app/core/ExceptionHandler.php';

require_once __DIR__ . '../../app/core/Database.php';
require_once __DIR__ . '../../app/repositories/BookingRepository.php';
require_once __DIR__ . '../../app/services/BookingService.php';




$container = new Container();

//Repository
$container->bind('UserRepository', function(){
    return new UserRepository();
    });

//Strategies
$container->bind('EmailLogin', function($c) {
    return new EmailLogin($c->make('UserRepository'));
});

$container->bind('OtpLogin', function($c){
    return new OtpLogin();
});

$container->bind('LoginValidator', function(){
    return new LoginValidator();
});

$container->bind('EmailValidation', function(){
    return new EmailValidation();
});

$container->bind('OtpValidation', function(){
    return new OtpValidation();
    });

$db = new Database();

$bookingRepo = new BookingRepository($db);
$bookingService = new BookingService($db, $bookingRepo);

//Example request
$result = $bookingService->bookTicket(1,5, 100);
echo json_encode($result);
?>