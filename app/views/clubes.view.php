<?php

    class ClubesView{
        
        public function mostrarClubes($clubes){
            require_once 'templates/clubes.list.phtml';
        }

        public function mostrarInfoClub($club){
            require_once 'templates/club.phtml';
        }

        public function mostrarFormClubes($clubes){
            require_once 'templates/form.club.administrador.phtml';
            require_once 'templates/adm.clubes.list.phtml';
        }


        public function clubParaEditar($club){
            require_once 'templates/form.editarClub.adm.phtml';
        }



        public function showError(){
            echo 'error'; //hacer un manejador de errores
        }
       
       
    }


?>