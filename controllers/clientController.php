<?php
    class clientController{

        public function create($data){

            $json=array(
                'Detail' => 'ClientController : create()',
                'data' => $data
            );

            //validacion de nombre
            if (!isset($data['name']) || !preg_match('/^[a-zA-ZáéíóúñÁÉÍÓÚÑ\s]+$/', $data['name'])) {
                $json=array(
                    'Status' => 404,
                    'Detail' => 'Error : only letters are allowed for the name',
                );
            }
            //validacion de apellido
            if(!isset($data['lastName']) || !preg_match('/^[a-zA-ZáéíóúñÁÉÍÓÚÑ\s]+$/', $data['lastName'])){
                $json=array(
                    'Status' => 404,
                    'Detail' => 'Error : only letters are allowed for the last name',
                );
            }
            //valida email
            if (!isset($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $json = array(
                    'Status' => 404,
                    'Detail' => 'Error: Invalid email format',
                );
            }

            echo json_encode($json);

        }
        
    }
    
?>