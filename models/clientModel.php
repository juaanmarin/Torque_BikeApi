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
            
            $stmt -> bindParam(':id_user', $data['idclient'], PDO::PARAM_STR);
            $stmt -> bindParam(':first_name', $data['name'], PDO::PARAM_STR);
            $stmt -> bindParam(':last_name', $data['lastName'], PDO::PARAM_STR);
            $stmt -> bindParam(':email', $data['email'], PDO::PARAM_STR);
            $stmt -> bindParam(':secret_key', $data['secretKey'], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return 'OK';
            }else{
                print_r(conection::conect()->errorInfo());
            }

            $stmt->close();
            $stmt = null;
        
        }

    }

?>