<?php require_once APP_PATH . '/views/layouts/header.php'; ?>

<!-- Hero Section -->
<?php if (isset($featured) && $featured): ?>
<section class="hero">
    <div class="hero-content">
        <div class="hero-image">
            <img src="<?php echo htmlspecialchars($featured['image']); ?>" alt="<?php echo htmlspecialchars($featured['title']); ?>">
        </div>
        <div class="hero-text">
            <span class="hero-label">Featured Article</span>
            <h2><?php echo htmlspecialchars($featured['title']); ?></h2>
            <p class="hero-excerpt"><?php echo htmlspecialchars($featured['excerpt']); ?></p>
            <div class="hero-meta">
                <span class="author">By <?php echo htmlspecialchars($featured['author']); ?></span>
                <span class="date"><?php echo date('F j, Y', strtotime($featured['date'])); ?></span>
            </div>
            <a href="/article/<?php echo htmlspecialchars($featured['slug']); ?>" class="btn btn-primary">Read More</a>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Articles Section -->
<section class="articles">
    <div class="container">
        <h2 class="section-title">Latest Articles</h2>
        <div class="articles-grid">
            <?php if (isset($articles) && !empty($articles)): ?>
                <?php foreach ($articles as $article): ?>
                    <?php if (!$article['featured']): ?>
                    <article class="article-card">
                        <div class="article-image">
                            <img src="<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>">
                        </div>
                        <div class="article-content">
                            <h3><a href="/article/<?php echo htmlspecialchars($article['slug']); ?>"><?php echo htmlspecialchars($article['title']); ?></a></h3>
                            <p class="article-excerpt"><?php echo htmlspecialchars($article['excerpt']); ?></p>
                            <div class="article-meta">
                                <span class="author">By <?php echo htmlspecialchars($article['author']); ?></span>
                                <span class="date"><?php echo date('M j, Y', strtotime($article['date'])); ?></span>
                            </div>
                            <a href="/article/<?php echo htmlspecialchars($article['slug']); ?>" class="read-more">Read More →</a>
                        </div>
                    </article>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No articles available at the moment.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php require_once APP_PATH . '/views/layouts/footer.php'; ?>
