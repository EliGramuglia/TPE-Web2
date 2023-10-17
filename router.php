<?php
require_once './app/controllers/jugadores.controller.php';
require_once './app/controllers/clubes.controller.php';
require_once './app/controllers/auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; 
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}
                 //TABLA DE RUTEO 
//home                  ->        jugadores.controller->showJugadores();
//clubes                ->        clubes.controller->showClubes();
//club/id               ->        clubes.controller->showClub($id);  
//jugador/id            ->        jugadores.controller->showJugador($id);
//formularioJugadores   ->        jugadores.controller->showFormJugadores();
//agregarJugador        ->        jugadores.controller->addJugador();
//eliminarJugador/id    ->        jugadores.controller->removeJugador($id); 
//editarJugador/id      ->        jugadores.controller->cargarDatosParaEditar($id);
//editandoJugador/id    ->        jugadores.controller->updateJugador($id);
//formularioClubes      ->        clubes.controller->showFormJugadores();
//agregarClub           ->        clubes.controller->addClub();
//eliminarClub/id       ->        clubes.controller->removeClub($id); 
//editarClub/id         ->        clubes.controller->cargarDatosParaEditar($id);
//editandoClub/id       ->        clubes.controller->updateClub($id);
//login                 ->        auth.Controller->showLogin();
//logout                ->        auth.contoller->logout();
//auth                  ->        auth.contoller->auth(); 


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
        $controller = new JugadoresController();
        $controller->showFormJugadores();
        break;         
    case 'agregarJugador':
        $controller = new JugadoresController();
        $controller->addJugador();
        break;
    case 'eliminarJugador':
        $controller = new JugadoresController();
        $controller->removeJugador($params[1]);
        break;
    case 'editarJugador':
        $controller = new JugadoresController();
        $controller->cargarDatosParaEditar($params[1]);
        break;
    case 'editandoJugador':
        $controller = new JugadoresController();
        $controller->updateJugador($params[1]);
        break;
    case 'formularioClubes':
        $controller = new ClubesController();
        $controller->showFormClubes();
        break; 
    case 'agregarClub':
        $controller = new ClubesController();
        $controller->addClub();
        break;  
    case 'eliminarClub':
        $controller = new ClubesController();
        $controller->removeClub($params[1]);
        break;  
    case 'editarClub':
        $controller = new ClubesController();
        $controller->cargarDatosParaEditar($params[1]);
        break;
    case 'editandoClub':
        $controller = new ClubesController();
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
        echo "404 Page Not Found";
        break;
}