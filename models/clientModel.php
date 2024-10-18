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

        static public function create($table, $data){

            $stmt = conection::conect()->prepare("INSERT INTO user (id_user, first_name, last_name, email, secret_key) values (:id_user, :first_name, :last_name, :email, :secret_key)"); 
            
        
        }

    }

?>