<?php
require_once './app/models/jugadores.model.php';
require_once './app/views/jugadores.view.php';
require_once './app/views/errores.view.php';
require_once './app/helper/auth.helper.php';

class AdministradorJugadoresController{
    private $model;
    private $view;
    private $model2;
    private $view2;


    public function __construct(){
        AuthHelper::verify();
        $this->model = new JugadoresModel();
        $this->view = new JugadoresView(); 
        $this->model2 = new ClubesModel(); 
        $this->view2 = new ErroresView(); 
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
        
         if (empty($nombre) || empty($edad) || empty($posicion) || empty($id_club)) {
             $this->view2->showError("Complete todos los campos");
             return;
         }
 
         $id = $this->model->insertJugador($nombre, $edad, $posicion, $goles, $id_club);
         if ($id) {
             header('Location: ' . BASE_URL . '/formularioJugadores');
         } else {
             $this->view2->showError("Error al insertar Jugador!");
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


            if (empty($nombre) || empty($edad) || empty($posicion) || empty($id_club)) {
                $this->view2->showError("Debe completar todos los campos");
                die();
            }

            $db_id = $this->model->updateJugador($nombre, $edad, $posicion, $goles, $id_club, $id);
            if ($db_id) {
                header('Location: ' . BASE_URL . '/formularioJugadores');
            } else {
                $this->view2->showError("No se pudo editar!");
            }     
    
        }
       
    }

}
?>