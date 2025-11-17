<?php
/**
 * Configuration file
 */

// Site configuration
define('SITE_NAME', 'SidePocketVibe');
define('SITE_TAGLINE', 'Your Source for Billiards News and Culture');
define('SITE_URL', 'http://localhost');

// Database configuration (if needed in future)
define('DB_HOST', 'localhost');
define('DB_NAME', 'sidepocketvibe');
define('DB_USER', 'root');
define('DB_PASS', '');

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Timezone
date_default_timezone_set('America/New_York');
