<?php
require_once './app/controllers/jugadores.controller.php';
require_once './app/controllers/clubes.controller.php';
require_once './app/controllers/auth.controller.php';
require_once './app/controllers/adminJugadores.controller.php';
require_once './app/controllers/adminClubes.controller.php';
require_once './app/controllers/error.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; 
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}
                 //TABLA DE RUTEO 
//home                  ->        JugadoresController->showJugadores();
//clubes                ->        ClubesController->showClubes();
//club/id               ->        clubesController->showClub($id);  
//jugador/id            ->        JugadoresController->showJugador($id);
//formularioJugadores   ->        AdministradorJugadoresController->showFormJugadores();
//agregarJugador        ->        AdministradorJugadoresController->addJugador();
//eliminarJugador/id    ->        AdministradorJugadoresController->removeJugador($id); 
//editarJugador/id      ->        AdministradorJugadoresController->cargarDatosParaEditar($id);
//editandoJugador/id    ->        AdministradorJugadoresController->updateJugador($id);
//formularioClubes      ->        AdministradorClubesController->showFormJugadores();
//agregarClub           ->        AdministradorClubesController->addClub();
//eliminarClub/id       ->        AdministradorClubesController->removeClub($id); 
//editarClub/id         ->        AdministradorClubesController->cargarDatosParaEditar($id);
//editandoClub/id       ->        AdministradorClubesController->updateClub($id);
//login                 ->        AuthController->showLogin();
//logout                ->        AuthController->logout();
//auth                  ->        AuthController->auth(); 
//asdfghjkl(no existe)  ->        ErrorController->error404();


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
    case 'club':
        $controller = new ClubesController();
        $controller->showClub($params[1]);
        break; 
    case 'jugador':
        $controller = new JugadoresController();
        $controller->showJugador($params[1]);
        break;        
    case 'formularioJugadores':
        $controller = new AdministradorJugadoresController();
        $controller->showFormJugadores();
        break;         
    case 'agregarJugador':
        $controller = new AdministradorJugadoresController();
        $controller->addJugador();
        break;
    case 'eliminarJugador':
        $controller = new AdministradorJugadoresController();
        $controller->removeJugador($params[1]);
        break;
    case 'editarJugador':
        $controller = new AdministradorJugadoresController();
        $controller->cargarDatosParaEditar($params[1]);
        break;
    case 'editandoJugador':
        $controller = new AdministradorJugadoresController();
        $controller->updateJugador($params[1]);
        break;
    case 'formularioClubes':
        $controller = new AdministradorClubesController();
        $controller->showFormClubes();
        break; 
    case 'agregarClub':
        $controller = new AdministradorClubesController();
        $controller->addClub();
        break;  
    case 'eliminarClub':
        $controller = new AdministradorClubesController();
        $controller->removeClub($params[1]);
        break;  
    case 'editarClub':
        $controller = new AdministradorClubesController();
        $controller->cargarDatosParaEditar($params[1]);
        break;
    case 'editandoClub':
        $controller = new AdministradorClubesController();
        $controller->updateClub($params[1]);
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
        break;
    default: 
        $controller = new ErrorController();
        $controller->error404();
        break;
}