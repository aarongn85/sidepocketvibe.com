<?php require_once APP_PATH . '/views/layouts/header.php'; ?>

<article class="single-article">
    <div class="container">
        <?php if (isset($article) && $article): ?>
            <div class="article-header">
                <h1><?php echo htmlspecialchars($article['title']); ?></h1>
                <div class="article-meta">
                    <?php if (!empty($article['author_name'])): ?>
                        <span class="author">✍️ By <?php echo htmlspecialchars($article['author_name']); ?></span>
                    <?php endif; ?>
                    <?php if (!empty($article['published_at'])): ?>
                        <span class="date">🕒 <?php echo date('F j, Y', strtotime($article['published_at'])); ?></span>
                    <?php endif; ?>
                </div>
            </div>
            
            <?php if (!empty($article['featured_image'])): ?>
            <div class="article-featured-image">
                <img src="<?php echo htmlspecialchars($article['featured_image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>">
            </div>
            <?php endif; ?>
            
            <div class="article-body">
                <?php 
                // Split content by double newlines to create paragraphs
                $paragraphs = explode("\n\n", $article['content']);
                foreach ($paragraphs as $paragraph) {
                    $paragraph = trim($paragraph);
                    if (!empty($paragraph)) {
                        // Convert single newlines to <br> within paragraphs
                        echo '<p>' . nl2br(htmlspecialchars($paragraph)) . '</p>';
                    }
                }
                ?>
            </div>
            
            <div class="article-footer">
                <a href="/" class="btn btn-secondary">← Back to Home</a>
            </div>
        <?php else: ?>
            <div class="article-not-found">
                <h1>Article Not Found</h1>
                <p>Sorry, the article you're looking for doesn't exist.</p>
                <a href="/" class="btn btn-primary">← Back to Home</a>
            </div>
        <?php endif; ?>
    </div>
</article>

<?php require_once APP_PATH . '/views/layouts/footer.php'; ?>
