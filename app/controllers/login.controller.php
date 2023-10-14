<?php
require_once  './app/views/login.view.php';
require_once  './app/models/login.model.php';

class LoginController
{
   private $view;
   private $model;

   function __construct()
   {
      $this->model = new LoginModel();
      $this->view = new LoginView();
   }

   public function ShowLogin()
   {
      $this->view->showLogin();
   }

   public function login()
   {
      $email = $_POST['email'];
      $password = $_POST['password'];

      if (empty($email) || empty($password)) {
         $this->view->showLogin('Complete todos los datos');
         return;
      }
   }
}
