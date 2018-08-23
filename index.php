<?php
$main_path = dirname(__FILE__);
define('APP_PATH', $main_path . '/app');
define('CONTROLLERS_PATH', $main_path . '/app/controllers');
define('MODEL_PATH', $main_path . '/app/models');
define('VIEW_PATH', $main_path . '/app/view');
define('CORE_PATH', $main_path . '/core');
define('DB_PATH', $main_path . '/core/database');
define('HELPER_PATH', $main_path . '/core/helper');
define('URL', 'http://localhost:8080/PHPMVC/');
define('URL_ASSETS', 'http://localhost:8080/PHPMVC/assets');


spl_autoload_register(function ($class_name){
    $path = array(APP_PATH, CONTROLLERS_PATH, MODEL_PATH, VIEW_PATH, CORE_PATH, DB_PATH, HELPER_PATH, URL, URL_ASSETS);
    foreach ($path as $class_file_path){
        $full_path =  $class_file_path.'/'.$class_name.'.php';
        if (file_exists($full_path)){
            require $full_path;
        }
    }
});

function view($view, $action, $data) {
    ob_start();
    extract($data);
    require VIEW_PATH.'/'.$view.'/'.$action.'.php';
    $out = ob_get_contents();
    ob_end_clean();
    echo $out;
}

$controller = isset($_REQUEST['controller']) ? $_REQUEST['controller'] : 'index';

$controller = strtolower($controller); //strtolower chuyển các chữ in hoa trong biến về chữ thường
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'index';
$action = strtolower($action);

$actionName = $action.'Action';
$controllerClass = $controller.'Controller';

if (class_exists($controllerClass)){
    $instanceController = new $controllerClass();
    if (method_exists($instanceController, $actionName)) {
        $instanceController -> $actionName();
    } else {
        $instanceController ->indexAction();
    }
} else {
    $controllerClass = 'errorControler';
    $instanceController = new $controllerClass;
}

