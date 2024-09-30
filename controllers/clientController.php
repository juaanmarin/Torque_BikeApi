<?php
    class clientController{

        public function create(){
            $json=array(
                'Detail' => 'Register Here'
            );

            echo json_encode($json);

        }
        
    }
    
?>