<?php

    class ClubesView{
        
        public function mostrarClubes($clubes){
            require_once 'templates/clubes.list.phtml';
        }

        public function mostrarInfoClub($club){
            require_once 'templates/club.phtml';
        }

        public function mostrarFormClubes($jugadores, $clubes){
            require_once 'templates/form.club.administrador.phtml';
            require_once 'templates/adm.clubes.list.phtml';
        }
       
    }


?>