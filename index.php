<?php require 'Routing.php';

    $path = trim($_SERVER['REQUEST_URI'],'/');
    $path = parse_url($path, PHP_URL_PATH);

    Routing::get('', 'DefaultController');
    Routing::get('index', 'DefaultController');
    Routing::get('projects', 'ProjectController');
    Routing::get('register', 'SecurityController');
    Routing::get('logout','DefaultController');
    Routing::post('login', 'SecurityController');
    Routing::post('addProject','ProjectController');
    Routing::post('search','ProjectController');
    Routing::post('searchMyProject','ProjectController');
    Routing::post('editProject','ProjectController');
    Routing::post('deleteProject','ProjectController');
    Routing::post('adminpanel','SecurityController');
    Routing::post('editUser','SecurityController');
    Routing::post('deleteUser','SecurityController');

    Routing::run($path);
?>


