<?php
    class Route{

        private static Array $routes = [];

        public static function get(String $path = '', Array $data = []){
            self::$routes['GET'][$path] = $data;
        }

        public static function post(String $path = '',Array $data = []){
            self::$routes['POST'][$path] = $data;
        }
     
        public static function route_init(String $method, String $url){
            if(isset(self::$routes[$method][$url])){
                $route_data =  self::$routes[$method][$url];
                $class = new $route_data[0];
                $method = $route_data[1];
           
                return $class->$method();
            }

            exit('rota invalida');
        }
    }

    Route::get('/', [StartController::class,'index']);


    Route::post('/create_user',[UserController::class, 'create_user'])
?>