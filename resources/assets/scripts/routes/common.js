export default {
  init() {
    // JavaScript to be fired on all pages
    class ResponsiveBackgroundImage {

      constructor(element) {
        this.element = element;
        this.img = element.querySelector('img');
        this.src = '';

        this.img.addEventListener('load', () => {
          this.update();
        });

        if (this.img.complete) {
          this.update();
        }
      }

      update() {
        let src = typeof this.img.currentSrc !== 'undefined' ? this.img.currentSrc : this.img.src;
        if (this.src !== src) {
          this.src = src;
          this.element.style.backgroundImage = 'url("' + this.src + '")';

        }
      }
    }

    let elements = document.querySelectorAll('[data-responsive-background-image]');
    for (let i=0; i<elements.length; i++) {
      new ResponsiveBackgroundImage(elements[i]);
    }

    $('.dropdown-toggle').click(function() {
      if( $(this).parent().hasClass('show') ) {
        var location = $(this).attr('href'); 
        window.location.href = location; 
        return false; 
      }
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
