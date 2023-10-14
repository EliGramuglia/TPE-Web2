<?php 
class LoginModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=db_jugadores/club;charset=utf8', 'root', '');
    }

    public function getByEmail($email){
        $query = $this->db->prepare('SELECT * FROM usarios WHERE email = ?');
        $query->execute([$email]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}




?>
