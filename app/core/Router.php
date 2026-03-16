<?php 

class Router{
  
  private $getRoutes = [];
  private $postRoutes = [];

  //Register for GET route
  public function get($path, $action){
    $this->getRoutes[$path] = $action;
  }

  //Register for POST route
  public function post($path, $action){
    $this->postRoutes[$path] = $action;
  }

  public function resolve(){
    $method = $_SERVER['REQUEST_METHOD'];

    //get the url path without query string
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    //Remove base folder if needed
    $uri = str_replace('/bookingWebsite/public', '', $uri);

    if($uri === ''){
      $uri = '/';
    }

    if($method === 'GET'){
      $action = $this->getRoutes[$uri] ?? null;
    }else{
      $action = $this->postRoutes[$uri] ?? null;
    }

    if(!$action){
      http_response_code(404);
      echo "404 - Page Not Found";
      return;
    }

    //Example: HomeController@index
    list($controllerName, $methodName) = explode('@', $action);

    require_once "../app/controllers/$controllerName.php";
    $controller = new $controllerName();
    $controller->$methodName();
  }
    
}


?>