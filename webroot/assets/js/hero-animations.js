// Hero Images Animation JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Get all hero images
    const heroImages = document.querySelectorAll('.hero-img');
    
    // Add initial opacity 0 to all images for fade-in effect
    heroImages.forEach(img => {
        img.style.opacity = '0';
    });
    
    // Function to check if element is in viewport
    function isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }
    
    // Function to animate elements when they come into view
    function animateOnScroll() {
        heroImages.forEach(img => {
            if (isInViewport(img) && img.style.opacity === '0') {
                // Trigger animation based on data attribute
                const animation = img.getAttribute('data-animation');
                img.style.opacity = '1';
            }
        });
    }
    
    // Run once on page load
    setTimeout(animateOnScroll, 300);
    
    // Listen for scroll events
    window.addEventListener('scroll', animateOnScroll);
    
    // Add parallax effect on mouse move
    const heroSection = document.querySelector('.center_h1r');
    
    if (heroSection) {
        heroSection.addEventListener('mousemove', function(e) {
            // Calculate mouse position relative to the container
            const xPos = (e.clientX / window.innerWidth) - 0.5;
            const yPos = (e.clientY / window.innerHeight) - 0.5;
            
            // Apply subtle movement to each image based on mouse position
            heroImages.forEach(img => {
                const speed = img.getAttribute('data-animation').includes('left') || 
                             img.getAttribute('data-animation').includes('right') ? 10 : 5;
                
                // Store original transform if not already stored
                if (!img.dataset.originalTransform) {
                    img.dataset.originalTransform = window.getComputedStyle(img).transform;
                    if (img.dataset.originalTransform === 'none') {
                        img.dataset.originalTransform = '';
                    }
                }
                
                // Apply parallax effect without overriding existing transforms
                const parallaxTransform = `translateX(${xPos * speed}px) translateY(${yPos * speed}px)`;
                img.style.transform = img.dataset.originalTransform ? 
                    `${img.dataset.originalTransform} ${parallaxTransform}` : parallaxTransform;
            });
        });
        
        // Reset position when mouse leaves
        heroSection.addEventListener('mouseleave', function() {
            heroImages.forEach(img => {
                // Restore original transform if available
                img.style.transform = img.dataset.originalTransform || '';
            });
        });
    }
    
    // Add click interaction
    heroImages.forEach(img => {
        img.addEventListener('click', function() {
            // Add a pulse animation on click
            img.classList.add('pulse-animation');
            
            // Remove the class after animation completes
            setTimeout(() => {
                img.classList.remove('pulse-animation');
            }, 1000);
        });
    });
});

$(".testimonial-carousel").owlCarousel({
  loop: true,
  margin: 30,
  nav: true,       // Enable nav arrows
  dots: true,      // Enable dots
  autoplay: true,
  autoplayTimeout: 4000,
  smartSpeed: 800,
  navText: [
    '<i class="fas fa-chevron-left"></i>',
    '<i class="fas fa-chevron-right"></i>'
  ],
  responsive: {
    0: { items: 1 },
    768: { items: 2 },
    992: { items: 3 }
  }
});

$(".partner-carousel").owlCarousel({
  loop: true,
  margin: 30,
  nav: false,       // Enable nav arrows
  dots: true,      // Enable dots
  autoplay: true,
  autoplayTimeout: 4000,
  smartSpeed: 800,

  responsive: {
    0: { items: 2 },
    768: { items: 4 },
    992: { items: 5 }
  }
});
