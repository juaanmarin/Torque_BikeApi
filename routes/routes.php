<?php 

    // se obtiene url dividida
    $arrRoutes = explode("/", $_SERVER['REQUEST_URI']);

    echo '<pre>'; 
        print_r($arrRoutes);
    echo '</pre>';


    if (count(array_filter($arrRoutes)) == 2) {
        //cuando no se pasa indice en la url    
        $json=array(
            'Detail' => 'No Entry'
        );
    }else{
        //cuando si se pasa indice en la url   
        if (count(array_filter($arrRoutes)) == 3) {
            
            //cuando se hace peticiones desde motocicletas
            if (array_filter($arrRoutes)[3] == 'bikes') {
                $json=array(
                    'Detail' => 'Bikes Here'
                );
            }

            //cuando se hace peticiones desde registro
            if (array_filter($arrRoutes)[3] == 'register') {
                $json=array(
                    'Detail' => 'Register Here'
                );
            }

        }
    }

    //se devuelve el detalle convertido a json
    echo json_encode($json, true);

?>