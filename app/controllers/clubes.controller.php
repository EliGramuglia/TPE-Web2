<?php
require_once './app/models/clubes.model.php';
require_once './app/views/clubes.view.php';

class ClubesController{
    private $model;
    private $view;

    public function __construct(){
        $this->model = new ClubesModel();
        $this->view = new ClubesView();   
    }

    public function showClubes(){
        $clubes = $this->model->getClubes();
        $this->view->mostrarClubes($clubes);
    }
}

?>