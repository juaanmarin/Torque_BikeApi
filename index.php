<?php
    require_once 'controllers/routesController.php';
    require_once 'controllers/bikesController.php';
    require_once 'controllers/clientController.php';

    $routes = new ControllerRoutes();
    $routes->start();
?>