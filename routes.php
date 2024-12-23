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

    //get routes
    Route::get('/', [NavController::class,'index']);
    Route::get('/sign_in', [NavController::class,'sign_in']);
    Route::get('/sign_up', [NavController::class,'sign_up']);
    Route::get('/logout', [UserController::class,'logout']);
    Route::get('/adm', [NavController::class,'adm']);
    Route::get('/adm/formCategoria', [CategoriaController::class,'form']);
    Route::get('/adm/formGenero', [GeneroController::class,'form']);
    Route::get('/adm/formTemporada', [TemporadaController::class,'form']);
    Route::get('/adm/formMidia', [MidiaController::class,'form']);
    Route::get('/adm/editMidia', [MidiaController::class,'get_edit']);
    
    //post routes
    Route::post('/sign_up',[UserController::class, 'create_user']);
    Route::post('/sign_in',[UserController::class, 'sign_in']);
    Route::post('/adm/formCategoria', [CategoriaController::class, 'insert']);
    Route::post('/adm/formGenero', [GeneroController::class, 'insert']);
    Route::post('/adm/formTemporada', [TemporadaController::class, 'insert']);
    Route::post('/adm/formMidia', [MidiaController::class, 'insert']);
    Route::post('/adm/editMidia', [MidiaController::class, 'update']);
    ?>