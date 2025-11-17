<?php require_once APP_PATH . '/views/layouts/header.php'; ?>

<article class="single-article">
    <div class="container">
        <div class="article-header">
            <h1><?php echo htmlspecialchars($article['title']); ?></h1>
            <div class="article-meta">
                <span class="author">By <?php echo htmlspecialchars($article['author']); ?></span>
                <span class="date"><?php echo date('F j, Y', strtotime($article['date'])); ?></span>
            </div>
        </div>
        
        <div class="article-featured-image">
            <img src="<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>">
        </div>
        
        <div class="article-body">
            <p><?php echo nl2br(htmlspecialchars($article['content'])); ?></p>
        </div>
        
        <div class="article-footer">
            <a href="/" class="btn btn-secondary">← Back to Home</a>
        </div>
    </div>
</article>

<?php require_once APP_PATH . '/views/layouts/footer.php'; ?>
