<?php

class JugadoresModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=db_jugadores_club;charset=utf8', 'root', '');
    }

    public function getJugadores(){
        $query = $this->db->prepare('SELECT * FROM jugadores');   
        $query->execute();

        $jugadores = $query->fetchall(PDO::FETCH_OBJ);
        return $jugadores;
    }

    public function getJugador(){
        $query = $this->db->prepare('SELECT * FROM jugadores');
        $query->execute();

        $jugador = $query->fetch(PDO::FETCH_OBJ);
        return $jugador;
    }
}