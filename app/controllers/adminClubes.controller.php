<?php
require_once './app/models/clubes.model.php';
require_once './app/views/clubes.view.php';
require_once './app/views/errores.view.php';
require_once './app/helper/auth.helper.php';

class AdministradorClubesController{
    private $model;
    private $view;
    private $view2;

    public function __construct(){   
        AuthHelper::verify(); 
        $this->model = new ClubesModel();
        $this->view = new ClubesView();  
        $this->view2 = new ErroresView();
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
            $this->view2->showError("Complete todos los campos");
            return;
        }

        $id = $this->model->insertClub($nombre, $fundacion, $titulosN, $titulosI);
        if ($id) {
            header('Location: ' . BASE_URL . '/formularioClubes');
        } else {
            $this->view2->showError("Error al insertar Club!");
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
                $this->view2->showError("Debe completar todos los campos");
                die();
            }

            $db_id = $this->model->updateClub($nombre, $fundacion, $titulosN, $titulosI, $id);
            if ($db_id) {
                header('Location: ' . BASE_URL . '/formularioClubes');
            } else {
                $this->view2->showError("No se pudo editar!");
            }    
    
        }
       
    }    
    
}

?>