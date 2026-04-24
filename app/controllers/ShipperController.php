<?php
require_once "../app/models/Shipper.php";

class ShipperController {
    public function index() {
        $data = (new Shipper())->getAll();
        require "../app/views/shipper/index.php";
    }
}