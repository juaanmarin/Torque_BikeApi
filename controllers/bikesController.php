<?php 
    class bikesController{
        
        public function index(){

            $bikes = 'Not auth';

            //autenticacion de usuario 
            if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {

                //se consultan todos los usuarios
                $client = clientModel::index('user');
                //si los id coinsiden se buscan los datos de todas las bikes 
                foreach ($client as $key => $value) {
                    if ($_SERVER['PHP_AUTH_USER'].':'.$_SERVER['PHP_AUTH_PW'] == $value['id_user'].':'.$value['secret_key']) {
                        $bikes = bikesModel::index('bikes');
                    }
                }   
            }

            $json=array(
                'Detail' => 'BikesController : index()',
                'message' => $bikes
            );

            echo json_encode($json);
        }

        public function create($data){
            $json=array(
                'Status' => '',
                'Detail' => 'BikesController : create()',
                'message' => 'this is view create'
            );

            if (isset($_SERVER['PHP_AUTH_USER']) && ($_SERVER['PHP_AUTH_PW']) ) {
                //se consultan todos los usuarios
                $client = clientModel::index('user');

                foreach ($client as $key => $value) {
                    if ($_SERVER['PHP_AUTH_USER'].':'.$_SERVER['PHP_AUTH_PW'] == $value['id_user'].':'.$value['secret_key']) {

                        foreach ($data as $key => $valuedata) {
                            if (!isset($valuedata) || !preg_match('/^[a-zA-ZáéíóúñÁÉÍÓÚÑ0-9\s]+$/', $valuedata)) {
                                $json=array(
                                    'Status' => 404,
                                    'Detail' => 'Error : invalid parameter -> '.$key,
                                );
                            }
                        }
                    }
                }
                
                $bikes = bikesModel::index('bikes');

                foreach ($bikes as $key => $value) {
                    if ($value->year == $data['year'] && $value->mark == $data['mark'] && $value->model == $data['model']) {
                        $json=array(
                            'Status' => 404,
                            'Detail' => 'the bike exist in the list',
                        );
                    }
                }

                $arrCreation = array(   'mark' => $data['mark'],
                                        'model' => $data['model'],
                                        'cc' => $data['cc'],
                                        'year' => $data['year'],
                                        'descript' => $data['descript']);

                if ($json['Status'] != 404) {
                    $create = bikesModel::create('bikes', $arrCreation);
                
                    if ($create == 'OK') {
                        $json=array(
                            'Status' => 200,
                            'Detail' => 'created success',
                            'Data' => $arrCreation
                        );
                    }
                }

            }

            echo json_encode($json);
        }

        public function show($id){
            $json=array(
                'Detail' => 'BikesController : show('.$id.')',
                'message' => 'this is bike with id number '.$id
            );

            echo json_encode($json);
        }

        public function update($id){
            $json=array(
                'Detail' => 'BikesController : update()',
                'message' => 'successfully updatd bike with id '.$id
            );

            echo json_encode($json);
        }

        public function delete($id){
            $json=array(
                'Detail' => 'BikesController : delet()',
                'message' => 'successfully deleted bike with id '.$id
            );

            echo json_encode($json);
        }

        
    }
    
?>