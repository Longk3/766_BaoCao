<?php

require_once "../app/controllers/AuthController.php";
require_once "../app/controllers/OrderController.php";
require_once "../app/controllers/CustomerController.php";
require_once "../app/controllers/ShipperController.php";
require_once "../app/controllers/DashboardController.php";
require_once "../app/controllers/AssignmentController.php";
require_once "../app/controllers/UserController.php";

$action = $_GET['action'] ?? 'home';

switch($action){

case 'login': (new AuthController())->login(); break;
case 'logout': (new AuthController())->logout(); break;

case 'dashboard': (new DashboardController())->index(); break;

case 'orders': (new OrderController())->index(); break;
case 'createOrder': (new OrderController())->create(); break;
case 'updateStatus': (new OrderController())->updateStatus(); break;
case 'assign': (new AssignmentController())->assign();break;
case 'myOrders': (new OrderController())->myOrders(); break;

case 'customers': (new CustomerController())->index(); break;
case 'shippers': (new ShipperController())->index(); break;
case 'home': require "../app/views/home/index.php"; break;

case 'register': (new AuthController())->register(); break;

case 'users': (new UserController())->index(); break;
case 'createUser': (new UserController())->create(); break;
case 'editUser': (new UserController())->edit(); break;
case 'deleteUser': (new UserController())->delete(); break;

default: echo "404";
}