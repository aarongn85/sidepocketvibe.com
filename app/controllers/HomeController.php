<?php
/**
 * Home Controller
 * Handles the homepage display
 */

class HomeController extends Controller {
    /**
     * Display the homepage with hero and articles
     */
    public function index() {
        // Load article model
        $articleModel = $this->model('Article');
        
        // Get featured and recent articles
        $featuredArticle = $articleModel->getFeatured();
        $recentArticles = $articleModel->getRecent(6);
        
        // Prepare data for the view
        $data = [
            'title' => 'Home',
            'featured' => $featuredArticle,
            'articles' => $recentArticles
        ];
        
        // Load the view
        $this->view('pages/home', $data);
    }
}
