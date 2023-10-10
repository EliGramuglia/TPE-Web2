<?php
<<<<<<< HEAD
require_once './app/controllers/jugadores.controller.php';
=======
require_once './App/controllers/jugadores.controller.php';
>>>>>>> 3470f63e0d380bc1d97454a49e14ec2611c1db56

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; 
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// home    ->           taskController->showHome();



// agregar   ->         taskController->addTask();
// eliminar/:ID  ->     taskController->removeTask($id); 
// finalizar/:ID  ->    taskController->finishTask($id);
// about ->             aboutController->showAbout();
// login ->             authContoller->showLogin();
// logout ->            authContoller->logout();
// auth                 authContoller->auth(); // toma los datos del post y autentica al usuario

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $controller = new jugadoresController();
        $controller->showJugadores();
        break;
    /*case 'agregar':
        $controller = new TaskController();
        $controller->addTask();
        break;
    case 'eliminar':
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
<<<<<<< HEAD
}
=======
}
>>>>>>> 3470f63e0d380bc1d97454a49e14ec2611c1db56
