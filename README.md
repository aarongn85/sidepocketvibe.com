# SidePocketVibe.com

A billiards magazine format website featuring news, articles, and culture about pool and billiards.

## Features

- **Custom PHP Router**: Clean URL routing system for easy navigation
- **MVC Architecture**: Organized structure with Models, Views, and Controllers
- **Responsive Design**: Mobile-friendly layout
- **Magazine Format**: Hero section and article grid on homepage
- **Article System**: Individual article pages with clean layouts
- **Static Pages**: About and Contact pages

## Project Structure

```
sidepocketvibe.com/
├── app/
│   ├── controllers/     # Application controllers
│   ├── core/           # Core classes (Router, Controller)
│   ├── models/         # Data models
│   └── views/          # View templates
│       ├── layouts/    # Header and footer
│       ├── pages/      # Page templates
│       └── errors/     # Error pages
├── config/             # Configuration files
├── public/             # Public web root
│   ├── css/           # Stylesheets
│   ├── js/            # JavaScript files
│   ├── images/        # Image assets
│   ├── .htaccess      # Apache rewrite rules
│   └── index.php      # Front controller
└── README.md
```

## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/aarongn85/sidepocketvibe.com.git
   cd sidepocketvibe.com
   ```

2. **Configure your web server**
   - Set the document root to the `public/` directory
   - Ensure Apache's `mod_rewrite` is enabled
   - PHP 7.4 or higher is required

3. **Update configuration**
   - Edit `config/config.php` to set your site URL and other settings
   - For production, set `display_errors` to 0

## Apache Configuration

If using Apache, ensure your virtual host points to the `public/` directory:

```apache
<VirtualHost *:80>
    ServerName sidepocketvibe.local
    DocumentRoot /path/to/sidepocketvibe.com/public
    
    <Directory /path/to/sidepocketvibe.com/public>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

## Development Server

For quick testing, you can use PHP's built-in server:

```bash
cd public
php -S localhost:8000
```

Then visit `http://localhost:8000` in your browser.

## Routes

The following routes are available:

- `/` - Homepage with featured article and article grid
- `/article/{slug}` - Individual article pages
- `/about` - About page
- `/contact` - Contact page

## Adding Content

### Articles

Articles are currently managed in `app/models/Article.php`. To add new articles, edit the `getAllArticles()` method and add your article data.

For a database-backed solution, you can:
1. Create a database table for articles
2. Update the Article model to query the database
3. Update configuration with database credentials

### Images

Place article images in `public/images/` and reference them in your article data.

## Customization

### Styling

Edit `public/css/style.css` to customize the appearance.

### Adding New Pages

1. Create a controller in `app/controllers/`
2. Create a view in `app/views/pages/`
3. Add a route in `public/index.php`

## License

Copyright © 2025 SidePocketVibe. All rights reserved.
