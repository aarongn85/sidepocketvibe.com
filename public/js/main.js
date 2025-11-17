/**
 * Main JavaScript file for SidePocketVibe.com
 */

document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle (if needed in future)
    console.log('SidePocketVibe.com loaded successfully');
    
    // Add smooth scrolling to all links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
});
