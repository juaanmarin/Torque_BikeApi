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

        static public function create($table, $data){

            $stmt = conection::conect()->prepare("INSERT INTO bikes (mark, model, cc, year, descript) values (:mark, :model, :cc, :year, :descript)"); 
            
            $stmt -> bindParam(':mark', $data['mark'], PDO::PARAM_STR);
            $stmt -> bindParam(':model', $data['model'], PDO::PARAM_STR);
            $stmt -> bindParam(':cc', $data['cc'], PDO::PARAM_STR);
            $stmt -> bindParam(':year', $data['year'], PDO::PARAM_STR);
            $stmt -> bindParam(':descript', $data['descript'], PDO::PARAM_STR);

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