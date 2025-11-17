# Deployment Guide for SidePocketVibe.com

## Quick Start

### Local Development
```bash
cd public
php -S localhost:8000
```
Visit `http://localhost:8000` in your browser.

### Apache Configuration

1. **Set Document Root** to the `public/` directory
2. **Enable mod_rewrite** module
3. **Configure Virtual Host:**

```apache
<VirtualHost *:80>
    ServerName sidepocketvibe.com
    ServerAlias www.sidepocketvibe.com
    DocumentRoot /var/www/sidepocketvibe.com/public
    
    <Directory /var/www/sidepocketvibe.com/public>
        Options -Indexes +FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
    
    ErrorLog ${APACHE_LOG_DIR}/sidepocketvibe-error.log
    CustomLog ${APACHE_LOG_DIR}/sidepocketvibe-access.log combined
</VirtualHost>
```

### Nginx Configuration

```nginx
server {
    listen 80;
    server_name sidepocketvibe.com www.sidepocketvibe.com;
    root /var/www/sidepocketvibe.com/public;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }
}
```

## Configuration

Edit `config/config.php` to update:
- Site URL
- Database credentials (if implementing database)
- Error reporting settings (set to 0 for production)
- Timezone

## Production Checklist

- [ ] Set `display_errors` to 0 in `config/config.php`
- [ ] Update `SITE_URL` in `config/config.php`
- [ ] Add real article images to `public/images/`
- [ ] Configure SSL certificate (HTTPS)
- [ ] Set proper file permissions (644 for files, 755 for directories)
- [ ] Configure database (if needed)
- [ ] Test all routes and pages
- [ ] Enable HTTPS redirect in `.htaccess`

## Adding Content

### New Articles
Edit `app/models/Article.php` and add to the `getAllArticles()` array:
```php
[
    'id' => 7,
    'slug' => 'your-article-slug',
    'title' => 'Your Article Title',
    'excerpt' => 'Brief description...',
    'content' => 'Full article content...',
    'image' => '/images/your-image.jpg',
    'author' => 'Author Name',
    'date' => '2025-11-17',
    'featured' => false
]
```

### New Pages
1. Create controller method in `app/controllers/PageController.php`
2. Create view file in `app/views/pages/`
3. Add route in `public/index.php`

## Troubleshooting

### Clean URLs Not Working
- Ensure Apache `mod_rewrite` is enabled
- Check `.htaccess` file exists in `public/`
- Verify `AllowOverride All` in Apache config

### 404 Errors for CSS/JS
- Check document root points to `public/` directory
- Verify file permissions

### PHP Errors
- Check PHP error logs
- Enable error reporting in development: `ini_set('display_errors', 1);`

## Maintenance

### Logs
- Apache: `/var/log/apache2/`
- Nginx: `/var/log/nginx/`
- PHP: Check `php.ini` for error_log location

### Backups
Regularly backup:
- `/app` directory (code)
- `/config` directory (configuration)
- Database (when implemented)
- `/public/images` (uploaded content)

## Security

- Keep PHP updated
- Use prepared statements for database queries (when implemented)
- Validate and sanitize all user input
- Keep `.htaccess` file secure
- Don't commit sensitive data to git
- Use HTTPS in production

## Support

For issues or questions, refer to:
- README.md for basic setup
- Project repository: https://github.com/aarongn85/sidepocketvibe.com
