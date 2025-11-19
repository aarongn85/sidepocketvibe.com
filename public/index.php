<?php
/**
 * SidePocketVibe.com
 * Front Controller - Entry point for all requests
 */

// Enable error display for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Define base paths
define('ROOT_PATH', dirname(__DIR__));
define('APP_PATH', ROOT_PATH . '/app');
define('PUBLIC_PATH', ROOT_PATH . '/public');

// Load bootstrap (includes config and system files)
require_once APP_PATH . '/system/bootstrap.php';

// Get the requested page from URL
$page = $_GET['page'] ?? 'home';
$page = strtolower(trim($page));

// Debug output (remove this later)
if (APP_DEBUG) {
    echo "<!-- DEBUG: index.php is running -->\n";
    echo "<!-- DEBUG: Requested page: " . htmlspecialchars($page) . " -->\n";
}

// Simple routing
switch ($page) {
    case 'home':
    case '':
    default:
        // Home page - catches empty page parameter too
        include APP_PATH . '/views/pages/home.php';
        break;
        
    case 'about':
        // About page
        include APP_PATH . '/views/pages/about.php';
        break;
        
    case 'contact':
        // Contact page
        include APP_PATH . '/views/pages/contact.php';
        break;
        
    case 'article':
        // Article detail page
        $slug = $_GET['slug'] ?? '';
        
        // Dummy article data (replace with database query later)
        $article = [
            'title' => 'The Art of the Break: Mastering Pool\'s Most Important Shot',
            'slug' => 'art-of-the-break',
            'author_name' => 'Mike Johnson',
            'published_at' => '2024-03-15 10:00:00',
            'featured_image' => 'https://images.unsplash.com/photo-1626224583764-f87db24ac4ea?w=1200&h=600&fit=crop',
            'content' => "The break shot in pool is arguably the most critical shot in the entire game. It sets the tone for the rack and can mean the difference between a commanding position and an uphill battle.\n\nProfessional players spend countless hours perfecting their break technique, understanding that consistency is key. The goal is not just power, but controlled power that maximizes ball spread while minimizing the chance of scratching.\n\nKey elements of a great break include:\n\n1. **Stance and Balance**: Your foundation must be solid. Most professionals use a slightly wider stance for the break to maintain stability through the powerful stroke.\n\n2. **Cue Ball Placement**: Depending on the game (8-ball, 9-ball, 10-ball), optimal cue ball placement varies. In 9-ball, many players prefer breaking from slightly off-center to create a more favorable spread.\n\n3. **Speed Control**: While power is important, a break that's too hard can cause the cue ball to fly off the table. Finding your optimal speed that maximizes ball spread while maintaining control is crucial.\n\n4. **Follow-Through**: A complete, fluid follow-through ensures maximum energy transfer to the cue ball. Many players focus on accelerating through the ball rather than hitting at the ball.\n\n5. **Practice Routine**: Top players often have specific break practice routines, marking ball positions and tracking success rates to refine their technique.\n\nRemember, the break is not just about raw power – it's about controlled aggression, consistency, and strategic positioning. Master your break, and you'll master the game.",
            'excerpt' => 'The break shot in pool is arguably the most critical shot in the entire game. Learn the key elements that professional players use to perfect their break technique.'
        ];
        
        include APP_PATH . '/views/pages/article.php';
        break;
        
    case 'articles':
        // Articles listing page
        // Dummy articles data (replace with database query later)
        $articles = [
            [
                'slug' => 'art-of-the-break',
                'title' => 'The Art of the Break: Mastering Pool\'s Most Important Shot',
                'author_name' => 'Mike Johnson',
                'published_at' => '2024-03-15 10:00:00',
                'excerpt' => 'The break shot in pool is arguably the most critical shot in the entire game.'
            ],
            [
                'slug' => 'choosing-your-cue',
                'title' => 'Choosing Your Perfect Cue: A Buyer\'s Guide',
                'author_name' => 'Sarah Williams',
                'published_at' => '2024-03-14 14:30:00',
                'excerpt' => 'Selecting the right pool cue is a personal decision that can significantly impact your game.'
            ],
            [
                'slug' => 'tournament-preparation',
                'title' => 'Mental Preparation for Tournament Play',
                'author_name' => 'David Chen',
                'published_at' => '2024-03-13 09:15:00',
                'excerpt' => 'Success in tournament pool requires more than just technical skill - mental preparation is key.'
            ]
        ];
        include APP_PATH . '/views/articles/index.php';
        break;
}
