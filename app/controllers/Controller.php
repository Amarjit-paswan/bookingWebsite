<?php 

//Base controller class for all controllers
class Controller{

    //Mehtod to lead a view file
    public function view($view)
    {

        //Build a view file path
        $path = "../app/views" . $view . ".php";

        //Check if view exists
        if(file_exists($path)){
            //load the view
            require_once $path;
        }else{
            //Show error if view not found
            echo "View not found";
        }
    }
}


?>