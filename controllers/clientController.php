<?php
    class clientController{

        public function create($data){

            $json=array(
                'Status' => '',
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
            //validar email repetido
            $clients = clientModel::index('user');

            foreach ($clients as $key => $value) {
                if($value['email'] == $data['email']){
                    $json=array(
                        'Status' => 404,
                        'Detail' => 'this email exist in bd',
                    );
                }

            }
            
            //generar hash para el id
            $hashid =  hash_hmac('sha256', $data['name'].$data['lastName'].$data['email'], '');
            $idclient = substr(base64_encode($hashid), 0, 32);

            //generar hash para la key
            $hashKey = hash_hmac('sha256', $data['email'].$data['lastName'].$data['name'], '');
            $secretKey = substr(base64_encode($hashKey), 0, 32);


            $arrCreation = array(
                'name' => $data['name'],
                'lastName' => $data['lastName'],
                'email' => $data['email'],
                'idclient' => $idclient,
                'secretKey'=> $secretKey,
                'created' => date('Y/m/d h:i:s'),
                'update' => date('Y/m/d h:i:s')
            );

            if ($json['Status'] != 404) {
                $create = clientModel::create('user', $arrCreation);
                
                if ($create == 'OK') {
                    $json=array(
                        'Status' => 200,
                        'Detail' => 'created success',
                        'Data' => $arrCreation
                    );
                }
            }

            
            echo json_encode($json);
            return;

        }
        
    }
    
?>