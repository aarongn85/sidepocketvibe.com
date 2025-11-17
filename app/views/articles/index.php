<?php
// app/views/articles/index.php
?>
  <h1>Articles</h1>
  <ul>
  <?php foreach ($articles as $slug => $a): ?>
    <li><a href="/articles/<?php echo htmlspecialchars($slug); ?>"><?php echo htmlspecialchars($a['title']); ?></a> — <?php echo htmlspecialchars($a['author']); ?></li>
  <?php endforeach; ?>
  </ul>
  <p><a href="/">Home</a></p>
