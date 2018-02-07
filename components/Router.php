<?php
/**
 * @return string текущий адрес запроса
*/

Class Router {
    private $routes;

    public function __construct() {
        $routesPath = CONFIG.'/routes.php';
        $this->routes = include($routesPath);
    }

    public function run() {
        $uri = $this->getUri();
        $internalRoute = $this->direct($this->routes, $uri);
        
        $segments = explode('/', $internalRoute);

        $controllerName = ucfirst(array_shift($segments))."Controller";
        $actionName = 'action'.ucfirst(array_shift($segments));
        $controllerFile = CONTROLLERS.$controllerName.".php";

        if (file_exists($controllerFile)) {
            include_once($controllerFile);            
        }

        $controllerObject = new $controllerName;
        //$controllerObject->$actionName();
        call_user_func_array(array($controllerObject, $actionName), $segments);
    }

    private function getURI() {
        if (isset($_SERVER['REQUEST_URI']) and !empty($_SERVER['REQUEST_URI']))
            return trim($_SERVER['REQUEST_URI'], '/');
    }

    function direct($routes, $uri) {
        foreach ($routes as $uriPattern => $path) {
            if (preg_match ("~^$uriPattern$~", $uri)) {
                $internalRoute = preg_replace("~^$uriPattern$~", $path, $uri);
                return $internalRoute;
                break;
            }
        }
    }
}