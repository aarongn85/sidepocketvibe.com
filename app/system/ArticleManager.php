<?php
/**
 * Article Manager Class
 * Handles article operations for SidePocketVibe
 */

class ArticleManager {
    private $db;
    
    public function __construct() {
        $this->db = Database::getInstance();
    }
    
    /**
     * Get articles with filtering and pagination
     */
    public function getArticles($options = []) {
        $limit = $options['limit'] ?? ARTICLES_PER_PAGE;
        $offset = $options['offset'] ?? 0;
        $category_id = $options['category_id'] ?? null;
        $featured_only = $options['featured_only'] ?? false;
        $status = $options['status'] ?? 'published';
        $order = $options['order'] ?? 'published_at DESC';
        
        $sql = "SELECT a.*, c.name as category_name, c.slug as category_slug,
                       au.name as author_name
                FROM articles a 
                LEFT JOIN categories c ON a.category_id = c.id 
                LEFT JOIN authors au ON a.author_id = au.id 
                WHERE a.status = ?";
        
        $params = [$status];
        
        if ($category_id) {
            $sql .= " AND a.category_id = ?";
            $params[] = $category_id;
        }
        
        if ($featured_only) {
            $sql .= " AND a.is_featured = 1";
        }
        
        $sql .= " ORDER BY a." . $order . " LIMIT ? OFFSET ?";
        $params[] = $limit;
        $params[] = $offset;
        
        return $this->db->query($sql, $params);
    }
    
    /**
     * Get single article by slug
     */
    public function getArticleBySlug($slug) {
        $sql = "SELECT a.*, c.name as category_name, c.slug as category_slug,
                       au.name as author_name, au.bio as author_bio
                FROM articles a 
                LEFT JOIN categories c ON a.category_id = c.id 
                LEFT JOIN authors au ON a.author_id = au.id 
                WHERE a.slug = ? AND a.status = 'published'";
        
        $result = $this->db->query($sql, [$slug]);
        return $result[0] ?? null;
    }
    
    /**
     * Get all categories
     */
    public function getCategories() {
        $sql = "SELECT * FROM categories ORDER BY name";
        return $this->db->query($sql);
    }
    
    /**
     * Format article date for display
     */
    public function formatDate($date, $format = 'M j, Y') {
        return date($format, strtotime($date));
    }
    
    /**
     * Get relative time (e.g., "2 hours ago")
     */
    public function getRelativeTime($datetime) {
        $time = time() - strtotime($datetime);
        
        if ($time < 60) return 'just now';
        if ($time < 3600) return floor($time / 60) . ' minutes ago';
        if ($time < 86400) return floor($time / 3600) . ' hours ago';
        if ($time < 604800) return floor($time / 86400) . ' days ago';
        if ($time < 2592000) return floor($time / 604800) . ' weeks ago';
        if ($time < 31536000) return floor($time / 2592000) . ' months ago';
        return floor($time / 31536000) . ' years ago';
    }
    
    /**
     * Estimate read time in minutes
     */
    public function estimateReadTime($content) {
        $wordCount = str_word_count(strip_tags($content));
        $minutes = ceil($wordCount / 200); // Average reading speed
        return max(1, $minutes);
    }
    
    /**
     * Generate article excerpt if none exists
     */
    public function generateExcerpt($content, $length = ARTICLE_EXCERPT_LENGTH) {
        $text = strip_tags($content);
        
        if (strlen($text) > $length) {
            $text = substr($text, 0, $length);
            $text = substr($text, 0, strrpos($text, ' ')) . '...';
        }
        
        return $text;
    }
}

/**
 * Helper function to get ArticleManager instance
 */
function getArticleManager() {
    return new ArticleManager();
}
