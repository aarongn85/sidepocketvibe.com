<?php
// app/controllers/ArticleController.php
class ArticleController {
    private $articles = [
        'welcome' => [
            'title' => 'Welcome',
            'author' => 'Admin',
            'body' => "This is a placeholder article named \"Welcome\". Replace with DB-driven content later."
        ],
        'getting-started' => [
            'title' => 'Getting Started',
            'author' => 'Admin',
            'body' => "This is a placeholder \"Getting Started\" article explaining the structure."
        ]
    ];

    public function index() {
        $articles = $this->articles;
        require_once APP_PATH . '/views/articles/index.php';
    }

    public function show($slug) {
        if (!isset($this->articles[$slug])) {
            http_response_code(404);
            require_once APP_PATH . '/views/errors/404.php';
            exit;
        }

        $article = $this->articles[$slug];
        require_once APP_PATH . '/views/articles/show.php';
    }
}
