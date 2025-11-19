<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Test - SidePocketVibe</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #0a0a0a;
            color: #fff;
        }
        .status { padding: 10px; margin: 10px 0; border-radius: 5px; }
        .success { background: #10b981; }
        .error { background: #ef4444; }
        .info { background: #3b82f6; }
        pre { background: #1a1a1a; padding: 15px; border-radius: 5px; overflow-x: auto; }
        h1 { color: #32D399; }
        h2 { color: #32D399; border-bottom: 2px solid #32D399; padding-bottom: 10px; }
        code { background: #1a1a1a; padding: 2px 6px; border-radius: 3px; }
    </style>
</head>
<body>
    <h1>SidePocketVibe Database Connection Test</h1>
    
    <?php
    // Load bootstrap
    require_once __DIR__ . '/../app/system/bootstrap.php';
    
    echo "<h2>Configuration Check</h2>";
    echo "<pre>";
    echo "DB_HOST: " . DB_HOST . "\n";
    echo "DB_NAME: " . DB_NAME . "\n";
    echo "DB_USER: " . DB_USER . "\n";
    echo "DB_PORT: " . DB_PORT . "\n";
    echo "APP_DEBUG: " . (APP_DEBUG ? 'true' : 'false') . "\n";
    echo "</pre>";
    
    echo "<h2>Database Connection Test</h2>";
    try {
        $db = Database::getInstance();
        
        if ($db->isConnected()) {
            echo '<div class="status success">✓ Database connection successful!</div>';
            
            // Test query
            echo "<h2>Tables Check</h2>";
            $tables = $db->query("SHOW TABLES");
            
            if (!empty($tables)) {
                echo '<div class="status success">✓ Found ' . count($tables) . ' tables</div>';
                echo "<pre>";
                foreach ($tables as $table) {
                    $tableName = array_values($table)[0];
                    echo "- $tableName\n";
                    
                    // Count records
                    $count = $db->queryRow("SELECT COUNT(*) as count FROM `$tableName`");
                    echo "  Records: " . $count['count'] . "\n";
                }
                echo "</pre>";
            } else {
                echo '<div class="status info">ℹ No tables found. Run the schema.sql file to create tables.</div>';
            }
            
            // Test ArticleManager
            echo "<h2>ArticleManager Test</h2>";
            try {
                $articleManager = getArticleManager();
                $articles = $articleManager->getArticles(['limit' => 5]);
                
                echo '<div class="status success">✓ ArticleManager working!</div>';
                echo "<p>Found " . count($articles) . " articles</p>";
                
                if (!empty($articles)) {
                    echo "<pre>";
                    foreach ($articles as $article) {
                        echo "- " . $article['title'] . " (slug: " . $article['slug'] . ")\n";
                    }
                    echo "</pre>";
                }
            } catch (Exception $e) {
                echo '<div class="status error">✗ ArticleManager error: ' . $e->getMessage() . '</div>';
            }
            
        } else {
            echo '<div class="status error">✗ Database connection failed</div>';
        }
        
    } catch (Exception $e) {
        echo '<div class="status error">✗ Error: ' . htmlspecialchars($e->getMessage()) . '</div>';
    }
    ?>
    
    <h2>Next Steps</h2>
    <ol>
        <li>Create the database: <code>mysql -u root -e "CREATE DATABASE sidepocketvibe"</code></li>
        <li>Import the schema: <code>mysql -u root sidepocketvibe < database/schema.sql</code></li>
        <li>Visit <a href="/" style="color: #32D399;">the homepage</a></li>
    </ol>
</body>
</html>
