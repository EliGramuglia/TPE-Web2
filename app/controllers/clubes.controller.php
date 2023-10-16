<?php
require_once './app/models/clubes.model.php';
require_once './app/views/clubes.view.php';
require_once './app/models/jugadores.model.php';

class ClubesController{
    private $model;
    private $view;
    private $model2;

    public function __construct(){
        $this->model = new ClubesModel();
        $this->view = new ClubesView();  
        $this->model2 = new JugadoresModel();
    }

    public function showClubes(){
        $clubes = $this->model->getClubes();
        $this->view->mostrarClubes($clubes);
    }

    public function showClub($id){
        if (!empty($id) && is_numeric($id)) {
            $club = $this->model->getClub($id);
        
            if ($club !== null) {
                $this->view->mostrarInfoClub($club);
            } else {
                header('Location: ' . BASE_URL);
            }
        } else {
            header('Location: ' . BASE_URL);
        }
    }


     //CRUD TABLA CLUBES

    //READ  (mostrar todos)
    public function showFormClubes(){
        $clubes = $this->model->getClubes();
        $jugadores = $this->model2->getJugadores();
        $this->view->mostrarFormClubes($jugadores, $clubes);
    }
    
}

?>