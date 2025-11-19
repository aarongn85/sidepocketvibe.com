<?php
/**
 * Bootstrap file for SidePocketVibe application
 * Initializes configuration, database, and core classes
 */

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Define root path if not already defined
if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', dirname(dirname(__DIR__)));
}

// Define app path
if (!defined('APP_PATH')) {
    define('APP_PATH', ROOT_PATH . '/app');
}

// Load configuration
require_once ROOT_PATH . '/config/config.php';

// Auto-load system classes
spl_autoload_register(function ($className) {
    $file = APP_PATH . '/system/' . $className . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// Load article management system
require_once APP_PATH . '/system/ArticleManager.php';
