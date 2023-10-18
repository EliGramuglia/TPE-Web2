<?php

    Class ErroresView{

        public function show404(){
            require_once 'templates/pageNotFound.php';
        }
      
        public function showError($error){
            require_once 'templates/error.php';
        }
    }