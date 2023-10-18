<?php 
    require_once './app/views/errores.view.php';

    Class ErrorController{
        private $view;

        public function __construct(){
            $this->view = new ErroresView();
        }

        public function error404() {
            $this->view->show404();
          }

    } 
?>