<?php
require_once './app/models/jugadores.model.php';
require_once './app/views/jugadores.view.php';

class JugadoresController{
    private $model;
    private $model2;
    private $view;

    public function __construct(){
        $this->model = new JugadoresModel();
        $this->model2 = new ClubesModel();
        $this->view = new JugadoresView();   
    }

    public function showJugadores(){
        $jugadores = $this->model->getJugadores();
        $this->view->mostrarJugadores($jugadores);
    }

    public function showJugador(){
        $jugador = $this->model->getJugador();
        if(){
            $this->view->mostrarJugador($jugador);
        }
    }

    public function showFormJugadores(){
        $this->view->mostrarFormJugadores();
    }

    public function addJugador(){
        
    }
}

?>