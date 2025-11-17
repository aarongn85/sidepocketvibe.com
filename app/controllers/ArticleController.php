<?php
/**
 * Article Controller
 * Handles article pages
 */

class ArticleController extends Controller {
    /**
     * Display a single article
     */
    public function show($slug) {
        // Load article model
        $articleModel = $this->model('Article');
        
        // Get the article by slug
        $article = $articleModel->getBySlug($slug);
        
        if (!$article) {
            http_response_code(404);
            $this->view('errors/404');
            return;
        }
        
        // Prepare data for the view
        $data = [
            'title' => $article['title'],
            'article' => $article
        ];
        
        // Load the view
        $this->view('pages/article', $data);
    }
}
