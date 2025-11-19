# Sticky Discord Sidebar Implementation

## Overview

Replaced the static 50/50 hero Discord layout with a dynamic sticky sidebar that:

- Opens automatically when at the top of the homepage
- Stays visible while scrolling throughout the site
- Can be collapsed/expanded with a toggle button
- Extends the full height of the viewport

## Backup Files Created

- `app/views/pages/home.php.backup` - Original homepage with 50/50 Discord layout
- `public/css/style.css.backup` - Original styles

## How It Works

### Homepage Behavior

1. **At Top**: Discord sidebar automatically opens, filling the right side of the hero section

   - Hero content has `padding-right: 370px` to make room
   - Toggle button is hidden (opacity: 0)

2. **After Scrolling**:

   - Discord remains open but toggle button appears
   - User can collapse it to the right edge
   - A Discord icon button stays visible on the right edge

3. **Manual Control**:
   - Click toggle button to collapse/expand anytime
   - State is remembered while on the page

### Other Pages

- Discord starts collapsed by default
- Toggle button is always visible
- Can be expanded anytime while browsing

## Key Features

### CSS Classes

- `.discord-sticky` - Main container, fixed position
- `.collapsed` - Slides sidebar off-screen to the right
- `.at-top` - Special state when at homepage top (auto-open, hide toggle)
- `body.discord-hidden` - Removes hero padding when collapsed

### JavaScript Functions

- `handleDiscordScroll()` - Detects scroll position and manages auto-open/close
- Toggle button click - Manual collapse/expand control
- `isManuallyCollapsed` - Tracks user preference

### Responsive Design

- Desktop (>1024px): 350px wide sidebar
- Tablet (768-1024px): 300px wide sidebar, no auto-open
- Mobile (<768px): 320px max width, full overlay style

## Visual Design

- **Toggle Button**:

  - 50×120px blue gradient button
  - Discord icon + arrow indicator
  - Hovers slightly left on mouseover
  - Arrow rotates 180° when expanded

- **Sidebar Panel**:
  - Full viewport height
  - Discord-themed dark colors (#36393f, #2f3136)
  - Shadow effect for depth
  - Smooth 0.4s cubic-bezier transition

## To Restore Original Version

```bash
cp app/views/pages/home.php.backup app/views/pages/home.php
cp public/css/style.css.backup public/css/style.css
```

## Future Enhancements

- Persist collapse state in localStorage
- Add swipe gestures for mobile
- Connect to real Discord API for live messages
- Add notification badge for new messages
