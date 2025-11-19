<?php
// app/views/articles/index.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles - SidePocket Vibe</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include APP_PATH . '/views/layouts/header.php'; ?>
    
    <main class="content-wrapper">
        <section class="content-section">
            <h1 class="section-title">All Articles</h1>
            
            <div class="articles-grid">
                <?php if (!empty($articles)): ?>
                    <?php foreach ($articles as $article): ?>
                        <article class="article-card">
                            <a href="/article?slug=<?php echo htmlspecialchars($article['slug']); ?>" class="article-card-link">
                                <div class="article-card-content">
                                    <h2 class="article-card-title"><?php echo htmlspecialchars($article['title']); ?></h2>
                                    <p class="article-card-meta">
                                        By <?php echo htmlspecialchars($article['author_name']); ?> • 
                                        <?php echo date('M j, Y', strtotime($article['published_at'])); ?>
                                    </p>
                                    <p class="article-card-excerpt"><?php echo htmlspecialchars($article['excerpt']); ?></p>
                                </div>
                            </a>
                        </article>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No articles available at this time.</p>
                <?php endif; ?>
            </div>
        </section>
    </main>
    
    <?php include APP_PATH . '/views/layouts/footer.php'; ?>
</body>
</html>
