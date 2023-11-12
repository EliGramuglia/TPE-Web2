<?php
require_once  './app/views/auth.view.php';
require_once  './app/models/user.model.php';
require_once './app/helper/auth.helper.php';


class AuthController {
   private $view;
   private $model;

   function __construct() {
      $this->model = new UserModel();
      $this->view = new AuthView();
   }

   public function ShowLogin() {
      $this->view->showLogin();
   }

   public function auth() {
      $email = $_POST['email'];
      $password = $_POST['password'];
      
      if (empty($email) || empty($password)) {
         $this->view->showLogin('Complete todos los datos');
         return;
      }
      
      $user = $this->model->getByEmail($email);

      if($user && password_verify($password, $user->password)){
         AuthHelper::login($user);
         header('Location: ' . BASE_URL . '/formularioJugadores');
      }else{      
        $this->view->showLogin('Usuario incorrecto');
      }
    }
    public function logout() {
      AuthHelper::logout();
      header('Location: ' . BASE_URL);    
  }

}