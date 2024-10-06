<?php

    require_once 'conection.php';

    class clientModel{

        static public function index($tabla){

            $stmt = conection::conect()->prepare('select * from '.$tabla); 
            $stmt->execute();
            return $stmt->fetchAll();

            $stmt->close();
            $stmt = null;

        }

    }

?>