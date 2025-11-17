<?php
// app/views/articles/show.php
?>
  <h1><?php echo htmlspecialchars($article['title']); ?></h1>
  <p><em>By <?php echo htmlspecialchars($article['author']); ?></em></p>
  <p><?php echo htmlspecialchars($article['body']); ?></p>
  <p><a href="/articles">Back to articles</a> | <a href="/">Home</a></p>
