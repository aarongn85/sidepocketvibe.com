<?php
/**
 * SidePocketVibe Configuration File
 * Environment based database and application settings
 */

// Load .env file for configuration
$envFile = __DIR__ . '/../.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue; // Skip comments
        }
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);
            $_ENV[$key] = $value;
        }
    }
}

// Database Configuration (PostgreSQL)
define('DB_HOST', $_ENV['PROD_DB_HOST'] ?? 'localhost');
define('DB_NAME', $_ENV['PROD_DB_NAME'] ?? 'sidepocketvibe');
define('DB_USER', $_ENV['PROD_DB_USER'] ?? 'postgres');
define('DB_PASS', $_ENV['PROD_DB_PASS'] ?? '');
define('DB_PORT', $_ENV['PROD_DB_PORT'] ?? '5432');
define('APP_DEBUG', filter_var($_ENV['APP_DEBUG'] ?? false, FILTER_VALIDATE_BOOLEAN));
define('SITE_URL', $_ENV['PROD_SITE_URL'] ?? 'http://localhost');

// Application Configuration
define('SITE_NAME', 'SidePocketVibe');
define('SITE_TAGLINE', 'Your Source for Billiards News and Culture');
define('APP_VERSION', '1.0.0');
define('ADMIN_EMAIL', $_ENV['PROD_ADMIN_EMAIL'] ?? 'admin@sidepocketvibe.com');

// Article System Configuration
define('ARTICLES_PER_PAGE', (int)($_ENV['ARTICLES_PER_PAGE'] ?? 6));
define('ARTICLES_PAGINATION_LIMIT', 10);
define('ARTICLE_EXCERPT_LENGTH', 150);
define('FEATURED_ARTICLES_COUNT', 3);

// Security Configuration
define('HASH_ALGORITHM', 'sha256');
define('SESSION_TIMEOUT', 3600); // 1 hour

// Timezone
date_default_timezone_set('America/New_York');

// Error Reporting (based on debug mode)
if (APP_DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}
