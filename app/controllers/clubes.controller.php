<?php
require_once './app/models/clubes.model.php';
require_once './app/views/clubes.view.php';
require_once './app/models/jugadores.model.php';


class ClubesController{
    private $model;
    private $view;
    private $model2;

    public function __construct(){    
        AuthHelper::init();

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
        $this->view->mostrarFormClubes($clubes);
    }

    
    //CREATE  (agregar uno)
    public function addClub(){
        // obtengo los datos del usuario
        $nombre = $_POST['nombre'];
        $fundacion = $_POST['fundacion'];
        $titulosN = $_POST['titulosN'];
        $titulosI = $_POST['titulosI'];
       
        if (empty($nombre) || empty($fundacion)) {
            $this->view->showError();
            return;
        }

        $id = $this->model->insertClub($nombre, $fundacion, $titulosN, $titulosI);
        if ($id) {
            header('Location: ' . BASE_URL . '/formularioClubes');
        } else {
            $this->view->showError();
        }     
   }    


    //DELETE (eliminar uno)
    public function  removeClub ($id){
        $this->model->deleteClub($id);
        header('Location: ' . BASE_URL . '/formularioClubes');
    }


    public function cargarDatosParaEditar($id){
        $club = $this->model->getClubEditar($id);
        $this->view->clubParaEditar($club);
    }


    //UPDATE (editar uno)
    public function updateClub($id){
        if ($_POST) {
            $nombre = $_POST['nombre'];
            $fundacion = $_POST['fundacion'];
            $titulosN = $_POST['titulosN'];
            $titulosI = $_POST['titulosI'];

            if (empty($nombre) || empty($fundacion)) {
                $this->view->showError();
                die();
            }

            $db_id = $this->model->updateClub($nombre, $fundacion, $titulosN, $titulosI, $id);
            if ($db_id) {
                header('Location: ' . BASE_URL . '/formularioClubes');
            } else {
                $this->view->showError();
            }    
    
        }
       
    }    
    
}

?>