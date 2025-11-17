<?php
/**
 * SidePocketVibe.com
 * Front Controller - Entry point for all requests
 */

// Start session
session_start();

// Define base paths
define('ROOT_PATH', dirname(__DIR__));
define('APP_PATH', ROOT_PATH . '/app');
define('PUBLIC_PATH', ROOT_PATH . '/public');

// Load configuration
require_once ROOT_PATH . '/config/config.php';

// Load core classes
require_once APP_PATH . '/core/Router.php';
require_once APP_PATH . '/core/Controller.php';

// Initialize router
$router = new Router();

// Define routes
$router->add('/', 'HomeController@index');
$router->add('/article/{slug}', 'ArticleController@show');
$router->add('/about', 'PageController@about');
$router->add('/contact', 'PageController@contact');

// Dispatch the request
$router->dispatch();
