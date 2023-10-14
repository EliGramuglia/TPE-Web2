<?php

class JugadoresModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=db_jugadores/club;charset=utf8', 'root', '');
    }

    public function getJugadores(){
        $query = $this->db->prepare('SELECT jugadores. *, club.Nombre_club FROM jugadores JOIN club ON jugadores.id_club = club.id_club;');   
        $query->execute();

        $jugadores = $query->fetchall(PDO::FETCH_OBJ);
        return $jugadores;
    }

    public function getJugador($id){
        $query = $this->db->prepare('SELECT jugadores.*, club.Nombre_club
         FROM jugadores JOIN club ON jugadores.id_club = club.id_club WHERE jugadores.id= ?;');
        $query->execute([$id]);

        $jugador = $query->fetch(PDO::FETCH_OBJ);
        return $jugador;
    }
}