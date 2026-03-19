<?php 


require_once  __DIR__ . '../../app/core/Container.php';
require_once  __DIR__ . '../../app/repositories/UserRepository.php';
require_once  __DIR__ . '../../app/services/Login/EmailLogin.php';
require_once  __DIR__ . '../../app/services/Login/OtpLogin.php';
require_once  __DIR__ . '../../app/services/AuthService.php';

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
})


?>