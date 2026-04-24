<?php

require_once "../app/controllers/AuthController.php";
require_once "../app/controllers/OrderController.php";
require_once "../app/controllers/DashboardController.php";
require_once "../app/controllers/AssignmentController.php";
require_once "../app/controllers/CustomerController.php";
require_once "../app/controllers/ShipperController.php";

$action = $_GET['action'] ?? 'login';

switch ($action) {

    case 'login':
        (new AuthController())->login();
        break;

    case 'logout':
        (new AuthController())->logout();
        break;

    case 'dashboard':
        (new DashboardController())->index();
        break;

    case 'orders':
        (new OrderController())->index();
        break;

    case 'updateStatus':
        (new OrderController())->updateStatus();
        break;

    case 'assign':
        (new AssignmentController())->assign();
        break;

    case 'customers':
        (new CustomerController())->index();
        break;

    case 'shippers':
        (new ShipperController())->index();
        break;

    case 'createOrder':
        (new OrderController())->create();
        break;

    default:
        echo "404";
}