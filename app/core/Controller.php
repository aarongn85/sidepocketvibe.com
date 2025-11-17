<?php
/**
 * Base Controller Class
 * All controllers extend this base class
 */

class Controller {
    /**
     * Load a model
     */
    protected function model($model) {
        $modelPath = APP_PATH . '/models/' . $model . '.php';
        if (file_exists($modelPath)) {
            require_once $modelPath;
            return new $model();
        }
        return null;
    }

    /**
     * Load a view
     */
    protected function view($view, $data = []) {
        // Extract data array to variables
        extract($data);

        // Build view path
        $viewPath = APP_PATH . '/views/' . $view . '.php';
        
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            die("View not found: " . $view);
        }
    }

    /**
     * Redirect to another page
     */
    protected function redirect($url) {
        header('Location: ' . SITE_URL . $url);
        exit;
    }
}
