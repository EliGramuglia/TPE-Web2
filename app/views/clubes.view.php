<?php

    class ClubesView{
        
        public function mostrarClubes($clubes){
            require_once 'templates/clubes.list.phtml';
        }

        public function mostrarInfoClub($club){
            require_once 'templates/club.phtml';
        }
       
    }


?>