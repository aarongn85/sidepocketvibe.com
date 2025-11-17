<?php 
$title = '404 - Page Not Found';
require_once APP_PATH . '/views/layouts/header.php'; 
?>

<section class="error-page">
    <div class="container">
        <div class="error-content">
            <h1>404</h1>
            <h2>Page Not Found</h2>
            <p>Sorry, the page you're looking for doesn't exist.</p>
            <a href="/" class="btn btn-primary">Go Back Home</a>
        </div>
    </div>
</section>

<?php require_once APP_PATH . '/views/layouts/footer.php'; ?>
