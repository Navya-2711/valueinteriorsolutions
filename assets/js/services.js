/**
* Service Pages JavaScript
* Handles Read More expand/collapse functionality
*/

(function() {
  "use strict";

  /**
   * Read More Button Click Handler
   */
  const readMoreButtons = document.querySelectorAll('.btn-read-more');
  
  readMoreButtons.forEach(button => {
    button.addEventListener('click', function(e) {
      e.preventDefault();
      
      const card = this.closest('.product-card');
      const expandedContent = card.querySelector('.product-card-expanded');
      
      if (expandedContent) {
        const isActive = expandedContent.classList.contains('active');
        
        // Close all other expanded cards
        document.querySelectorAll('.product-card-expanded.active').forEach(content => {
          if (content !== expandedContent) {
            content.classList.remove('active');
            const otherButton = content.closest('.product-card').querySelector('.btn-read-more');
            if (otherButton) {
              otherButton.textContent = 'Read More';
            }
          }
        });
        
        // Toggle current card
        if (isActive) {
          expandedContent.classList.remove('active');
          this.textContent = 'Read More';
        } else {
          expandedContent.classList.add('active');
          this.textContent = 'Read Less';
        }
      }
    });
  });

  /**
   * Smooth scroll for anchor links
   */
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      const href = this.getAttribute('href');
      if (href !== '#' && href.length > 1) {
        e.preventDefault();
        const target = document.querySelector(href);
        if (target) {
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }
      }
    });
  });

})();
