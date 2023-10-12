<?php

class ClubesModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=db_jugadores_club;charset=utf8', 'root', '');
    }

    public function getClubes(){
        $query = $this->db->prepare('SELECT * FROM club');   
        $query->execute();

        $clubes = $query->fetchall(PDO::FETCH_OBJ);
        return $clubes;
    }
}

?>