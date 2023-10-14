<?php

class ClubesModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=db_jugadores/club;charset=utf8', 'root', '');
    }

    public function getClubes(){
        $query = $this->db->prepare('SELECT * FROM club');   
        $query->execute();

        $clubes = $query->fetchall(PDO::FETCH_OBJ);
        return $clubes;
    }

    public function getClub($id){
        $query = $this->db->prepare('SELECT jugadores.Nombre FROM jugadores JOIN club 
        ON jugadores.id_club = club.id_club WHERE id=?;');   
        $query->execute([$id]);

        $club = $query->fetchAll(PDO::FETCH_OBJ);
        return $club;
    }
}

?>