<?php 

    // se obtiene url dividida
    $arrRoutes = explode("/", $_SERVER['REQUEST_URI']);

    // echo '<pre>'; 
    //     print_r($arrRoutes);
    // echo '</pre>';


    //cuando no se pasa indice en la url  
    if (count(array_filter($arrRoutes)) == 2) {
          
        $json=array(
            'Detail' => 'No Entry'
        );
        echo json_encode($json, true);
    }else{
        //cuando si se pasa indice en la url   
        if (count(array_filter($arrRoutes)) == 3) {
            
            //cuando se hace peticiones desde motocicletas
            if (array_filter($arrRoutes)[3] == 'bikes') {

                if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST')  {
                    $bikes = new bikesController();
                    $bikes->create();
                }elseif (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'GET') {
                    $bikes = new bikesController();
                    $bikes->index();
                }

            }

            //cuando se hace peticiones desde registro
            if (array_filter($arrRoutes)[3] == 'register') {

                if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){

                    $data = array(  'name' => $_POST['name'],
                                    'lastName' => $_POST['lastName'],
                                    'email' => $_POST['email']);

                    $client = new clientController();
                    $client->create($data);
                }

            }

        }else{
            if(array_filter($arrRoutes)[3] == 'bikes' && is_numeric(array_filter($arrRoutes)[4])){
                if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'GET'){
                    $bikes = new bikesController();
                    $bikes->show(array_filter($arrRoutes)[4]);
                }

                //
                if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'PUT'){
                    $editBikes = new bikesController();
                    $editBikes->update(array_filter($arrRoutes)[4]);
                }

                if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'DELETE'){
                    $deleteBikes = new bikesController();
                    $deleteBikes->delete(array_filter($arrRoutes)[4]);
                }
            }
        }
    }

    //se devuelve el detalle convertido a json
    //echo json_encode($json, true);

?>