<?php
/**
 * Article Model
 * Handles article data (currently using static data, can be connected to database later)
 */

class Article {
    /**
     * Get all articles (sample data)
     */
    private function getAllArticles() {
        return [
            [
                'id' => 1,
                'slug' => 'mastering-the-break',
                'title' => 'Mastering the Break: Techniques from the Pros',
                'excerpt' => 'Learn the secrets of a powerful and controlled break shot from professional players.',
                'content' => 'The break shot is one of the most crucial aspects of pool. A good break can set the tone for the entire game...',
                'image' => '/images/break-shot.jpg',
                'author' => 'Mike Johnson',
                'date' => '2025-11-15',
                'featured' => true
            ],
            [
                'id' => 2,
                'slug' => 'pool-cue-maintenance',
                'title' => 'Essential Pool Cue Maintenance Tips',
                'excerpt' => 'Keep your cue in top condition with these maintenance tips.',
                'content' => 'A well-maintained cue is essential for consistent play. Here are some tips to keep your equipment in pristine condition...',
                'image' => '/images/cue-maintenance.jpg',
                'author' => 'Sarah Chen',
                'date' => '2025-11-14',
                'featured' => false
            ],
            [
                'id' => 3,
                'slug' => 'bank-shots-guide',
                'title' => 'The Art of Bank Shots',
                'excerpt' => 'Master the geometry and technique behind perfect bank shots.',
                'content' => 'Bank shots require precision, practice, and understanding of angles. This guide will help you improve your banking game...',
                'image' => '/images/bank-shot.jpg',
                'author' => 'David Martinez',
                'date' => '2025-11-13',
                'featured' => false
            ],
            [
                'id' => 4,
                'slug' => 'choosing-your-first-cue',
                'title' => 'Choosing Your First Pool Cue',
                'excerpt' => 'A beginner\'s guide to selecting the perfect cue for your game.',
                'content' => 'Buying your first pool cue is an exciting milestone. Here\'s what you need to know...',
                'image' => '/images/first-cue.jpg',
                'author' => 'Lisa Thompson',
                'date' => '2025-11-12',
                'featured' => false
            ],
            [
                'id' => 5,
                'slug' => 'mental-game-of-pool',
                'title' => 'The Mental Game of Pool',
                'excerpt' => 'Develop the mental toughness needed to compete at higher levels.',
                'content' => 'Pool is as much a mental game as it is physical. Learn how to stay focused under pressure...',
                'image' => '/images/mental-game.jpg',
                'author' => 'James Wilson',
                'date' => '2025-11-11',
                'featured' => false
            ],
            [
                'id' => 6,
                'slug' => 'nine-ball-strategy',
                'title' => '9-Ball Strategy for Beginners',
                'excerpt' => 'Learn the fundamentals of 9-ball strategy and positioning.',
                'content' => '9-ball is one of the most popular pool games. Here\'s how to approach the game strategically...',
                'image' => '/images/nine-ball.jpg',
                'author' => 'Mike Johnson',
                'date' => '2025-11-10',
                'featured' => false
            ]
        ];
    }

    /**
     * Get featured article
     */
    public function getFeatured() {
        $articles = $this->getAllArticles();
        foreach ($articles as $article) {
            if ($article['featured']) {
                return $article;
            }
        }
        return $articles[0] ?? null;
    }

    /**
     * Get recent articles
     */
    public function getRecent($limit = 6) {
        $articles = $this->getAllArticles();
        return array_slice($articles, 0, $limit);
    }

    /**
     * Get article by slug
     */
    public function getBySlug($slug) {
        $articles = $this->getAllArticles();
        foreach ($articles as $article) {
            if ($article['slug'] === $slug) {
                return $article;
            }
        }
        return null;
    }
}
