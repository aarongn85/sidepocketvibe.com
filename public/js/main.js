/**
 * Main JavaScript file for SidePocketVibe.com
 */

document.addEventListener("DOMContentLoaded", function () {
  console.log("SidePocketVibe.com loaded successfully");

  // Add smooth scrolling to all links
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute("href"));
      if (target) {
        target.scrollIntoView({
          behavior: "smooth",
        });
      }
    });
  });

  // Hero Slider
  const heroSlider = document.querySelector(".hero-slider");
  if (heroSlider) {
    const slides = heroSlider.querySelectorAll(".hero-slide");
    const dots = document.querySelectorAll(".hero-slider-dot");
    const prevBtn = document.querySelector(".hero-slider-prev");
    const nextBtn = document.querySelector(".hero-slider-next");
    let currentSlide = 0;
    let autoPlayInterval;

    function showSlide(index) {
      // Remove active class from all slides and dots
      slides.forEach((slide) => slide.classList.remove("active"));
      dots.forEach((dot) => dot.classList.remove("active"));

      // Wrap around if needed
      if (index >= slides.length) {
        currentSlide = 0;
      } else if (index < 0) {
        currentSlide = slides.length - 1;
      } else {
        currentSlide = index;
      }

      // Add active class to current slide and dot
      slides[currentSlide].classList.add("active");
      dots[currentSlide].classList.add("active");
    }

    function nextSlide() {
      showSlide(currentSlide + 1);
    }

    function prevSlide() {
      showSlide(currentSlide - 1);
    }

    function startAutoPlay() {
      stopAutoPlay(); // Clear any existing interval
      autoPlayInterval = setInterval(nextSlide, 7000); // Change slide every 7 seconds
    }

    function stopAutoPlay() {
      if (autoPlayInterval) {
        clearInterval(autoPlayInterval);
        autoPlayInterval = null;
      }
    }

    // Event listeners
    if (nextBtn) {
      nextBtn.addEventListener("click", () => {
        nextSlide();
        stopAutoPlay();
        startAutoPlay(); // Restart autoplay after manual interaction
      });
    }

    if (prevBtn) {
      prevBtn.addEventListener("click", () => {
        prevSlide();
        stopAutoPlay();
        startAutoPlay();
      });
    }

    dots.forEach((dot, index) => {
      dot.addEventListener("click", () => {
        showSlide(index);
        stopAutoPlay();
        startAutoPlay();
      });
    });

    // Pause autoplay on hover
    heroSlider.addEventListener("mouseenter", stopAutoPlay);
    heroSlider.addEventListener("mouseleave", startAutoPlay);

    // Start autoplay
    startAutoPlay();
  }

  // Sticky Discord Sidebar
  const discordSidebar = document.getElementById("stickyDiscord");
  const collapseBtn = document.getElementById("discordCollapseBtn");
  const expandBtn = document.getElementById("discordExpandBtn");
  const shrinkBtn = document.getElementById("discordShrinkBtn");
  const openBtn = document.getElementById("discordOpenBtn");

  if (discordSidebar) {
    let isManuallyCollapsed = false;

    // Collapse button handler
    if (collapseBtn) {
      collapseBtn.addEventListener("click", () => {
        discordSidebar.classList.add("collapsed");
        isManuallyCollapsed = true;
        document.body.classList.add("discord-hidden");
      });
    }

    // Open button handler (when collapsed)
    if (openBtn) {
      openBtn.addEventListener("click", () => {
        discordSidebar.classList.remove("collapsed");
        isManuallyCollapsed = false;
        document.body.classList.remove("discord-hidden");
      });
    }

    // Expand button handler (maximize to fullscreen)
    if (expandBtn) {
      expandBtn.addEventListener("click", () => {
        discordSidebar.classList.add("expanded");
        document.body.classList.add("discord-expanded");
      });
    }

    // Shrink button handler (exit fullscreen)
    if (shrinkBtn) {
      shrinkBtn.addEventListener("click", () => {
        discordSidebar.classList.remove("expanded");
        document.body.classList.remove("discord-expanded");
      });
    }

    // Channel switching
    const channelItems = document.querySelectorAll(".discord-channel-item");
    const channelNameHeader = document.querySelector(".discord-header h3");
    const channelTopicHeader = document.querySelector(".channel-topic");

    channelItems.forEach((item) => {
      item.addEventListener("click", () => {
        // Remove active class from all channels
        channelItems.forEach((ch) => ch.classList.remove("active"));

        // Add active class to clicked channel
        item.classList.add("active");

        // Update header with channel name and topic (if elements exist)
        const channelName = item.querySelector(".channel-name").textContent;
        if (channelNameHeader) {
          channelNameHeader.textContent = channelName;
        }

        // Update channel topic based on selected channel
        if (channelTopicHeader) {
          const topics = {
            "general-chat":
              "Welcome to SidePocket Vibe! Share your thoughts and connect with the community",
            "billiards-news":
              "Latest updates and breaking news from the world of billiards",
            "pool-tips": "Share and learn pro tips, techniques, and strategies",
            "tournament-talk": "Discuss upcoming and ongoing tournaments",
            "equipment-reviews":
              "Reviews and recommendations for cues, tables, and accessories",
          };

          // Get channel name from the clicked item's data or text
          const channelKey = channelName.toLowerCase().replace(/[^a-z-]/g, "");
          channelTopicHeader.textContent =
            topics[channelKey] || "Community discussion channel";
        }
      });
    });

    // Server item clicks (navigate to article links)
    const serverItems = document.querySelectorAll(".discord-server-item");
    serverItems.forEach((item) => {
      item.addEventListener("click", () => {
        const link = item.getAttribute("data-link");
        if (link) {
          window.location.href = link;
        }
      });
    });
  }
});
