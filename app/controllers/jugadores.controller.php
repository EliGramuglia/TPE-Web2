<?php
require_once './app/models/jugadores.model.php';
require_once './app/views/jugadores.view.php';

class JugadoresController{
    private $model;
    private $view;
    private $model2;

    public function __construct(){
        $this->model = new JugadoresModel();
        $this->view = new JugadoresView();  
        $this->model2 = new ClubesModel(); 
    }

    public function showJugadores(){
        $jugadores = $this->model->getJugadores();
        $this->view->mostrarJugadores($jugadores);
    }

    public function showJugador($id){
        //me falta chequear si el id existe en la tabla
        if (!empty($id) && is_numeric($id)) {
            $jugador = $this->model->getJugador($id);
        
            if ($jugador !== false) {
                $this->view->mostrarJugador($jugador);
            } else {
                header('Location: ' . BASE_URL);
            }
        } else {
            header('Location: ' . BASE_URL);
        }
    }


 //CRUD TABLA JUGADORES

    //READ  (mostrar todos)
    public function showFormJugadores(){
        $jugadores = $this->model->getJugadores();
        $clubes = $this->model2->getClubes();
        $this->view->mostrarFormJugadores($jugadores, $clubes);
    }


    //CREATE  (agregar uno)
    public function addJugador(){
         // obtengo los datos del usuario
         $nombre = $_POST['nombre'];
         $edad = $_POST['edad'];
         $posicion = $_POST['posicion'];
         $goles = $_POST['goles'];
         $id_club = $_POST['id_club'];
        
         if (empty($nombre) || empty($edad) || empty($posicion) || empty($goles) || empty($id_club)) {
             $this->view->showError();
             return;
         }
 
         $id = $this->model->insertJugador($nombre, $edad, $posicion, $goles, $id_club);
         if ($id) {
             header('Location: ' . BASE_URL . '/formularioJugadores');
         } else {
             $this->view->showError();
         }     
    }


    //DELETE (eliminar uno)
    public function  removeJugador ($id){
        $this->model->deleteJugador($id);
        header('Location: ' . BASE_URL . '/formularioJugadores');
    }


    public function cargarDatosParaEditar($id){
        $jugador = $this->model->getJugador($id);
        $clubes = $this->model2->getClubes();
        $this->view->jugadorParaEditar($jugador, $clubes);
    }


    //UPDATE (editar uno)
    public function updateJugador($id){
        if ($_POST) {
            $nombre = $_POST['nombre'];
            $edad = $_POST['edad'];
            $posicion = $_POST['posicion'];
            $goles = $_POST['goles'];
            $id_club = $_POST['id_club'];

            if (empty($nombre) || empty($edad) || empty($posicion) || empty($goles) || empty($id_club)) {
                $this->view->showError();
                return;
            }

            $id = $this->model->updateJugador($nombre, $edad, $posicion, $goles, $id_club, $id);
            if ($id) {
                header('Location: ' . BASE_URL . '/formularioJugadores');
            } else {
                $this->view->showError();
            }     
    
        }
       
    }

}