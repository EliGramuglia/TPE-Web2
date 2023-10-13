<?php

    class JugadoresView{
        
        public function mostrarJugadores($jugadores){
            require_once 'templates/jugadores.list.phtml';
        }

        public function mostrarJugador($jugador){
            require_once 'templates/jugador.phtml';
        }
       
        public function mostrarFormJugadores(){
            require_once 'templates/header.phtml';
            require_once 'templates/form.administrador.phtml';
        }

     
        
    }


?>