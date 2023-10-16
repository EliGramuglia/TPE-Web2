<?php

    class JugadoresView{
        
        public function mostrarJugadores($jugadores){
            require_once 'templates/jugadores.list.phtml';
        }

        public function mostrarJugador($jugador){
            require_once 'templates/jugador.phtml';
        }
       
        public function mostrarFormJugadores($jugadores, $clubes){
            require_once 'templates/form.jugadores.administrador.phtml';
            require_once 'templates/adm.jugadores.list.phtml';
        }

        public function jugadorParaEditar($jugador, $clubes){
            require_once 'templates/form.editarJugador.adm.phtml';
        }


        
        public function showError(){
            echo 'error'; //hacer un manejador de errores
        }
    }


?>