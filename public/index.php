<?php

require_once "../app/controllers/AuthController.php";
require_once "../app/controllers/OrderController.php";
require_once "../app/controllers/CustomerController.php";
require_once "../app/controllers/ShipperController.php";
require_once "../app/controllers/DashboardController.php";
require_once "../app/controllers/AssignmentController.php";
require_once "../app/controllers/UserController.php";
require_once "../app/controllers/RevenueController.php";
require_once "../app/controllers/ProfileController.php";

$action = $_GET['action'] ?? 'home';

switch($action){

case 'login': (new AuthController())->login(); break;
case 'logout': (new AuthController())->logout(); break;

case 'dashboard': (new DashboardController())->index(); break;

case 'orders': (new OrderController())->index(); break;
case 'createOrder':
    require_once "../app/controllers/OrderController.php";
    $controller = new OrderController();
    $controller->create();
break;

case 'storeOrder':
    require_once "../app/controllers/OrderController.php";
    $controller = new OrderController();
    $controller->store();
break;
case 'editOrder':
    require_once "../app/controllers/OrderController.php";
    $controller = new OrderController();
    $controller->edit();
break;

case 'updateOrder':
    require_once "../app/controllers/OrderController.php";
    $controller = new OrderController();
    $controller->update();
break;

case 'deleteOrder':
    require_once "../app/controllers/OrderController.php";
    $controller = new OrderController();
    $controller->delete();
break;

case 'showOrder':
    require_once "../app/controllers/OrderController.php";
    $controller = new OrderController();
    $controller->show();
break;
case 'update_order_status':
    require_once "../app/controllers/OrderController.php";
    (new OrderController())->updateStatus();
break;
case 'assign': (new AssignmentController())->assign();break;
case 'my_orders':

    require_once "../app/controllers/ShipperController.php";

    (new ShipperController())->myOrders();

break;


case 'shipper_history':

    require_once "../app/controllers/ShipperController.php";

    (new ShipperController())->history();

break;
case 'customers': (new CustomerController())->index(); break;
case 'createCustomer':
    require_once "../app/controllers/CustomerController.php";
    $controller = new CustomerController();
    $controller->create();
break;

case 'storeCustomer':
    require_once "../app/controllers/CustomerController.php";
    $controller = new CustomerController();
    $controller->store();
break;

case 'editCustomer':
    require_once "../app/controllers/CustomerController.php";
    $controller = new CustomerController();
    $controller->edit();
break;

case 'updateCustomer':
    require_once "../app/controllers/CustomerController.php";
    $controller = new CustomerController();
    $controller->update();
break;

case 'deleteCustomer':
    require_once "../app/controllers/CustomerController.php";
    $controller = new CustomerController();
    $controller->delete();
break;
case 'shippers': (new ShipperController())->index(); break;
case 'createShipper':
    require_once "../app/controllers/ShipperController.php";
    $controller = new ShipperController();
    $controller->create();
break;

case 'storeShipper':
    require_once "../app/controllers/ShipperController.php";
    $controller = new ShipperController();
    $controller->store();
break;

case 'showShipper':
    require_once "../app/controllers/ShipperController.php";
    $controller = new ShipperController();
    $controller->show();
break;

case 'editShipper':
    require_once "../app/controllers/ShipperController.php";
    $controller = new ShipperController();
    $controller->edit();
break;

case 'updateShipper':
    require_once "../app/controllers/ShipperController.php";
    $controller = new ShipperController();
    $controller->update();
break;

case 'deleteShipper':
    require_once "../app/controllers/ShipperController.php";
    $controller = new ShipperController();
    $controller->delete();
break;
case 'home': require "../app/views/home/index.php"; break;

case 'register': (new AuthController())->register(); break;

// USERS

case 'users':
    require_once "../app/controllers/UserController.php";
    $controller = new UserController();
    $controller->index();
break;

case 'user_create':
    require_once "../app/controllers/UserController.php";
    $controller = new UserController();
    $controller->create();
break;

case 'user_edit':
    require_once "../app/controllers/UserController.php";
    $controller = new UserController();
    $controller->edit();
break;

case 'user_delete':
    require_once "../app/controllers/UserController.php";
    $controller = new UserController();
    $controller->delete();
break;

case 'revenue':
    (new RevenueController())->index();
break;

case 'profile':
    (new ProfileController())->show();
break;

case 'editProfile':
    (new ProfileController())->edit();
break;

case 'updateProfile':
    (new ProfileController())->update();
break;

case 'changePassword':
    (new ProfileController())->changePassword();
break;

case 'updatePassword':
    (new ProfileController())->updatePassword();
break;

default: echo "404";
}