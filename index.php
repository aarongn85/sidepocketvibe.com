<?php
/**
 * Root Index - Redirects to public folder
 * This file handles requests when document root is set to project root
 */

// Redirect to public folder
header('Location: /public/');
exit;
