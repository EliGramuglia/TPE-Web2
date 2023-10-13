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

    public function showJugador($id){
        //me falta chequear si el id existe en la tabla
        if (!empty($id) && is_numeric($id)) {
            $jugador = $this->model->getJugador($id);
        
            if ($jugador !== null) {
                $this->view->mostrarJugador($jugador);
            } else {
                header('Location: ' . BASE_URL);
            }
        } else {
            header('Location: ' . BASE_URL);
        }
    }


    //todavia no estan implementadas
    public function showFormJugadores(){
        $this->view->mostrarFormJugadores();
    }

    public function addJugador(){
        
    }
}
