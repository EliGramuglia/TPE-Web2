<?php
require_once './app/models/jugadores.model.php';
require_once './app/views/jugadores.view.php';

class JugadoresController{
    private $model;
    private $view;

    public function __construct(){
        $this->model = new JugadoresModel();
        $this->view = new JugadoresView();
        
    }

    public function showJugadores(){
        $jugadores = $this->model->getJugadores();
        $this->view->mostrarJugadores($jugadores);
    }
}

?>