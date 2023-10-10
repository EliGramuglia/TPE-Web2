<?php

    class JugadoresModel{        
       private $db; 
       
       function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=jugadores_club;charset=utf8', 'root', '');
       }


        public function getJugadores(){
            $query = $this->db->prepare('SELECT * FROM jugadores');

            $query->execute();

            $jugadores = $query->fetchAll(PDO::FETCH_OBJ);

            return $jugadores;
        }
        
    }


?>