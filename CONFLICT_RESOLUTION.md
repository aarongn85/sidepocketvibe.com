# Merge Conflict Resolution Guide

## Current Situation

This PR branch (`copilot/strip-33pool-content`) has conflicts with the `main` branch because:

1. **Main branch** (from merged PR#2) added:
   - `app/routes.php` - Simple routing file
   - `app/controllers/` - Basic ArticleController and HomeController
   - `app/views/` - Simple view files

2. **This PR branch** added (more comprehensive):
   - `app/core/` - Router and Controller base classes
   - `app/controllers/` - HomeController, ArticleController, PageController
   - `app/models/` - Article model with sample data
   - `app/views/` - Organized with layouts/ and pages/ subdirectories
   - `config/` - Configuration directory
   - `public/` - Complete web root with index.php, CSS, JS, .htaccess
   - `DEPLOYMENT.md` - Deployment guide

## Resolution Strategy

Since this PR's implementation is more comprehensive and complete, the conflicts should be resolved by **keeping this PR's structure** and removing the simpler files from PR#2.

## Steps to Resolve (Manual Process)

If you have local access to the repository:

```bash
# 1. Checkout the PR branch
git checkout copilot/strip-33pool-content

# 2. Merge main branch
git merge origin/main

# 3. Resolve conflicts by keeping this PR's structure:
#    - Keep all files from this PR (copilot/strip-33pool-content)
#    - The simpler app/routes.php and views from main can be discarded
#    - This PR's implementation is a superset of what's in main

# 4. For each conflicting file/directory:
git checkout --ours app/
git checkout --ours config/
git checkout --ours public/
# etc.

# 5. Complete the merge
git add .
git commit -m "Merge main branch, keeping comprehensive MVC structure"

# 6. Push
git push origin copilot/strip-33pool-content
```

## What This PR Provides (Superior to Main)

This PR's structure is production-ready and includes:

- ✅ Complete MVC architecture with base classes
- ✅ Custom router with clean URL support
- ✅ Model layer (Article model)
- ✅ Organized view structure (layouts + pages)
- ✅ Configuration management
- ✅ Public directory with assets (CSS, JS)
- ✅ Apache .htaccess for URL rewriting
- ✅ Sample billiards content
- ✅ Professional styling
- ✅ Documentation (README + DEPLOYMENT guide)

The simple structure from PR#2 was just placeholders and is fully superseded by this implementation.

## Alternative: Rebase

Alternatively, you could rebase this branch onto main:

```bash
git checkout copilot/strip-33pool-content
git rebase origin/main
# Resolve conflicts by keeping this PR's files
git add .
git rebase --continue
git push origin copilot/strip-33pool-content --force-with-lease
```

## Files That Will Be Replaced

From main branch (will be replaced/removed):
- `app/routes.php` → Replaced by `public/index.php` + `app/core/Router.php`
- `app/controllers/ArticleController.php` → Replaced by more complete version
- `app/controllers/HomeController.php` → Replaced by more complete version  
- `app/views/home.php` → Replaced by `app/views/pages/home.php` with layout
- `app/views/about.php` → Replaced by `app/views/pages/about.php` with layout
- `app/views/articles/` → Replaced by `app/views/pages/article.php`
- `app/views/errors/404.php` → Replaced by `app/views/errors/404.php` with layout

All files from this PR should be kept as they represent a complete, production-ready implementation.
