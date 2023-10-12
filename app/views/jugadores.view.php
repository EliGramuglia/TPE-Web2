<?php

    class JugadoresView{
        
        public function mostrarJugadores($jugadores){
            require_once 'templates/jugadores.list.phtml';
        }

        public function mostrarJugador($jugador){
            require_once 'templates/jugadores.list.phtml';
        }
       
        public function mostrarFormJugadores(){
            require_once 'templates/form.administrador.phtml';
            require_once 'templates/jugadores.list.phtml';
        }

     
        
    }


?>