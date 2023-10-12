<?php
require_once './app/controllers/jugadores.controller.php';
require_once './app/controllers/clubes.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; 
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

//home      ->        jugadores.controller->showHome();
//clubes        ->     clubes.controller->showClubes();  
//formularioJugadores   ->  jugadores.controller->showFormJugadores();
//agregar    ->        jugadores.controller->addJugador();


// eliminar/:ID  ->     taskController->removeTask($id); 
// finalizar/:ID  ->    taskController->finishTask($id);
// about ->             aboutController->showAbout();
// login ->             authContoller->showLogin();
// logout ->            authContoller->logout();
// auth                 authContoller->auth(); // toma los datos del post y autentica al usuario


$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $controller = new JugadoresController();
        $controller->showJugadores();
        break;
    case 'clubes':
        $controller = new ClubesController();
        $controller->showClubes();
        break;    
    case 'formularioJugadores':
        $controller = new JugadoresController();
        $controller->showFormJugadores();
        break;        
    case 'agregar':
        $controller = new JugadoresController();
        $controller->addJugador();
        break;
    /*case 'eliminar':
        $controller = new TaskController();
        $controller->removeTask($params[1]);
        break;
    case 'finalizar':
        $controller = new TaskController();
        $controller->finishTask($params[1]);
        break;
    case 'about':
        $controller = new AboutController();
        $controller->showAbout();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->showLogin(); 
        break;
    case 'auth':
        $controller = new AuthController();
        $controller->auth();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;*/
    default: 
        echo "404 Page Not Found";
        break;
}