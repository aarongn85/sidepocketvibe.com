<?php
// app/controllers/HomeController.php
class HomeController {
    public function index() {
        require_once APP_PATH . '/views/home.php';
    }

    public function about() {
        require_once APP_PATH . '/views/about.php';
    }
}
