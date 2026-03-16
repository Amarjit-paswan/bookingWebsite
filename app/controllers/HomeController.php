<?php 

//import base controller class
require_once '../app/controllers/Controller.php';

//Create a HomeController class to handle homePage
class HomeController extends Controller{

    //create a method to handle "/" route
    public function index(){

        //temproray message for tesing
        echo "Application running";
    }
}

?>