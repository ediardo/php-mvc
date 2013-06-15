<?php

        
    error_reporting(0);
    //error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT', getcwd());
    define('APP_ROOT',ROOT.DS.'..');
    define('APP_CONTROLLERS', APP_ROOT.DS.'controller');
    define('APP_MODELS', APP_ROOT.DS.'model');
    define('APP_VIEWS', APP_ROOT.DS.'view');
    include(APP_ROOT.DS.'lib'.DS.'controller.php');
    include(APP_ROOT.DS.'lib'.DS.'database.php');
    include(APP_ROOT.DS.'lib'.DS.'model.php');
    include(APP_ROOT.DS.'lib'.DS.'view.php');
    $controller = $_GET['controller'];
    $action = $_GET['action'];
    $controllers = scandir(APP_CONTROLLERS);
    foreach($controllers as $file){
        if($file != ".." && $file != ".")
            include(APP_CONTROLLERS.DS.$file);
    }
    switch($controller){
        case 'users':
            $User = new UsersController($action);
            break;
        case 'numbers':
            $Number = new NumbersController($action);
            break;
        case 'reports':
            $Report = new ReportsController($action);
            break;
        case 'comments':
            $Comment = new CommentsController($action);
            break;
    }

?>