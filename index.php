<?php
    require_once 'controllers/routesController.php';
    require_once 'controllers/bikesController.php';
    require_once 'controllers/clientController.php';
    require_once 'models/clientModel.php';
    require_once 'models/bikesModel.php';

    $routes = new ControllerRoutes();
    $routes->start();
?>