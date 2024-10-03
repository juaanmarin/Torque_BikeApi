<?php
    require_once 'conection.php';

    class bikesModel{

        static public function index($tabla){
            $stmt = conection::conect()->prepare('select * from '.$tabla); 
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS);

            $stmt->close();
            $stmt = null;

        }
        
    }
    
?>