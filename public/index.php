<?php 


//load router class
require_once './app/core/Router.php';

//create a router object
$router = new Router();

//Load the route definitions
require_once './app/routes/web.php';

//Handle the current request
$router->resolve();




?>