<?php
require_once "../app/models/Shipper.php";
require_once "../app/libs/AuthMiddleware.php";

class ShipperController {
    public function index() {
        AuthMiddleware::role(['admin']);
        $data = (new Shipper())->getAll();
        require "../app/views/shipper/index.php";
    }
}