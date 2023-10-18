<?php
require_once './app/models/clubes.model.php';
require_once './app/views/clubes.view.php';


class ClubesController{
    private $model;
    private $view;

    public function __construct(){    
        AuthHelper::init();
        $this->model = new ClubesModel();
        $this->view = new ClubesView();  
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
    
}

?>