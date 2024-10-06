<?php 
    class bikesController{
        
        public function index(){

            $bikes = bikesModel::index('bikes');;

            $json=array(
                'Detail' => 'BikesController : index()',
                'message' => $bikes
            );

            echo json_encode($json);
        }

        public function create(){
            $json=array(
                'Detail' => 'BikesController : create()',
                'message' => 'this is view create'
            );

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