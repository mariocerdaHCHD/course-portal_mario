<?php
    namespace App\Routes;

    class Route{
        private $routes = [];
        public function testing(){
            echo "testing";
        }
        //define a route 
        public function add($url,$controller,$action){
            $this->routes[$url] = [
                'controller' => $controller,
                'action' => $action
            ];
          //  print_r($this->routes);
        }

        //match request URL to a route and call the associated
        //controller action
        public function routeRequest($requestedURL){
            //check if the controller and action
            echo $requestedURL;
            print_r($this->routes);
            if(isset($this->routes[$requestedURL])){
                $route = $this->routes[$requestedURL];
                $controllerName = 'App\\Controllers\\' .
                    $route['controller'];
                $controller = new $controllerName();
                $controller->{$route['action']}();
            }else{
                echo '404 Not Found';
            }
        }

        //to redirect to another page
        public function redirect($location){
            header("Location: $location");
            exit();
        }
        // public static function get($uri, $handler){
        //     self::$routes['GET'][$uri] = $handler;
        // }

        // public static function post($uri,$handler){
        //     self::$routes['POST'][$uri] = $handler;
        // }

        // public static function handle($method,$uri){
        //     if(isset(self::$routes[$method][$uri])){
        //         $handler = self::$routes[$method][$uri];
        //         if(is_callable($handler)){
        //             call_user_func($handler);
        //         }else{

        //             list($controller,$method) = explode('@',$handler);
        //             $controllerInstance = new $controller();
        //             $controllerInstance->$method();
        //         }
        //     }else{

        //         echo "404 Not Found";
        //     }
        // }
    }
    ?>