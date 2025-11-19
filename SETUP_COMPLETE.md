# SidePocketVibe.com - Setup Complete ✓

## What Was Fixed

Your project now has the proper database connection and configuration setup modeled after 33pool.com.

**IMPORTANT: The site works WITHOUT a database right now!** The database connection is optional and only used when available. This lets you develop and test the site before setting up MySQL.

### 1. Environment Configuration (.env)

- Created `.env` file with database credentials
- Supports MySQL database connection
- Environment variables for easy configuration

### 2. Configuration System (config/config.php)

- Updated to load `.env` file
- Environment-based configuration
- Debug mode support
- All constants properly defined

### 3. Database Layer (app/system/Database.php)

- **Lazy Connection**: Database only connects when first query is run
- **Optional**: Site works without database connection
- Singleton pattern for connection management
- MySQL PDO connection with UTF-8 support
- Query methods: `query()`, `queryRow()`, `execute()`, `insert()`
- Transaction support
- Error handling with debug mode

### 4. Article Management (app/system/ArticleManager.php)

- Handles article operations
- Category management
- Date formatting and relative time
- Read time estimation
- Excerpt generation

### 5. Bootstrap System (app/system/bootstrap.php)

- Initializes configuration
- Auto-loads system classes
- Session management
- Path definitions

### 6. Front Controller (public/index.php)

- Fixed routing to prevent directory listing
- Simple page routing
- Proper error handling
- 404 support

### 7. Database Schema (database/schema.sql)

- MySQL schema with tables:
  - `authors` - Content authors
  - `categories` - Article categories
  - `articles` - Main content
- Sample data included
- Foreign key relationships
- Proper indexes

## Setup Instructions

### 1. MAMP Configuration

Your MAMP setup is correct:

- Port: 8888
- Document Root: This project folder

### 2. Site Ready to Use!

**Your site works NOW without any database setup!**

Visit: http://localhost:8888/

The site will show a welcome message. When you're ready to add articles, follow steps 3-4 below.

### 3. Create Database (Optional - for later)

```bash
# Using MAMP's MySQL
/Applications/MAMP/Library/bin/mysql -u root -p
```

Or use phpMyAdmin at `http://localhost:8888/phpMyAdmin`

### 4. Import Schema (Optional - for later)

```bash
# From terminal
/Applications/MAMP/Library/bin/mysql -u root sidepocketvibe < database/schema.sql
```

Or import `database/schema.sql` through phpMyAdmin

### 5. Update .env if needed (Optional - for later)

Edit `.env` file if your database credentials are different:

```
PROD_DB_HOST=localhost
PROD_DB_NAME=sidepocketvibe
PROD_DB_USER=root
PROD_DB_PASS=your_password_here
PROD_DB_PORT=3306
```

### 6. Test Your Setup

**Homepage (Works NOW):**
http://localhost:8888/

**Database Test (When ready):**
http://localhost:8888/db-test.php

## HTTPS Issue - RESOLVED

The "secure connection" error was caused by **HSTS (HTTP Strict Transport Security)** from your previous project. Your browser cached a policy to always use HTTPS for `localhost:8888`.

### Solutions (in order):

1. **Clear HSTS in Chrome:**

   - Go to: `chrome://net-internals/#hsts`
   - Under "Delete domain security policies"
   - Enter: `localhost`
   - Click "Delete"

2. **Use Incognito Mode:**

   - Opens without cached HSTS policies

3. **Hard Refresh:**

   - Mac: `Cmd + Shift + R`
   - Or: DevTools → Right-click refresh → "Empty Cache and Hard Reload"

4. **Use 127.0.0.1:**
   - Try: `http://127.0.0.1:8888`

## Project Structure

```
sidepocketvibe.com/
├── .env                      # Environment configuration
├── config/
│   └── config.php           # Main configuration (loads .env)
├── app/
│   ├── system/              # Core system files
│   │   ├── bootstrap.php    # Application initialization
│   │   ├── Database.php     # Database connection class
│   │   └── ArticleManager.php  # Article management
│   ├── controllers/         # Your existing controllers
│   ├── models/             # Your existing models
│   ├── views/              # Your existing views
│   └── core/               # Your existing core files
├── public/                 # Web root
│   ├── index.php          # Front controller (fixed)
│   ├── db-test.php        # Database test page
│   ├── css/
│   ├── js/
│   └── images/
└── database/
    └── schema.sql         # Database schema
```

## Next Steps

1. **Start Using the Site NOW!** Visit http://localhost:8888/
2. Clear HSTS in Chrome if you get SSL errors (see above)
3. Customize the views and styling to match your design
4. **When ready for articles:** Set up database using steps 3-4 above
5. Test database with http://localhost:8888/db-test.php

## Differences from 33pool.com

- **Database:** MySQL instead of PostgreSQL
- **Simplified:** Removed authentication, beta signup, and other 33pool-specific features
- **Focused:** Just the core article/content management system
- **Same Architecture:** Database layer, configuration, and bootstrap patterns

## Need Help?

- Database test: `/db-test.php`
- Check `.env` file for credentials
- Enable debug mode: `APP_DEBUG=true` in `.env`
- Check MAMP logs in MAMP application

---

**Ready to go!** Your site should now load properly at http://localhost:8888 after setting up the database.
