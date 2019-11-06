export default {
  init() {
    // JavaScript to be fired on all pages

    // Get responsive hero images; cut/paste them on background of parent section.
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

    /*
    * Replace all SVG images with inline SVG
    */
    jQuery('img').filter(function() {
      return this.src.match(/.*\.svg$/);
    }).each(function(){
      var $img = jQuery(this);
      var imgID = $img.attr('id');
      var imgClass = $img.attr('class');
      var imgURL = $img.attr('src');

      jQuery.get(imgURL, function(data) {
          // Get the SVG tag, ignore the rest
          var $svg = jQuery(data).find('svg');

          // Add replaced image's ID to the new SVG
          if(typeof imgID !== 'undefined') {
              $svg = $svg.attr('id', imgID);
          }
          // Add replaced image's classes to the new SVG
          if(typeof imgClass !== 'undefined') {
              $svg = $svg.attr('class', imgClass+' replaced-svg');
          }

          // Remove any invalid XML tags as per http://validator.w3.org
          $svg = $svg.removeAttr('xmlns:a');

          // Replace image with new SVG
          $img.replaceWith($svg);

          if(!$svg.attr('viewBox')){
            $svg.attr('viewBox', ('0 0 '
              + $svg.attr('width').match(/[0-9]+\.[0-9]*/) + ' '
              + $svg.attr('height').match(/[0-9]+\.[0-9]*/)));
          }

      }, 'xml');

    });

    // Dropdowns redirect on click
    $('.dropdown-toggle').click(function() {
      if( $(this).parent().hasClass('show') ) {
        var location = $(this).attr('href'); 
        if( '#' != location ) {
          window.location.href = location; 
          return false; 
        }
      }
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
