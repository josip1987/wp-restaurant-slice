import $ from 'jquery';

class Images {
    constructor() {
          //make boxes same size as images initally and on resize
          var images = $('.box-image');
          if (images && images.length > 0) {
              var imageHeight = images[0].height;
              var boxes = $('.content-box');
              $(boxes).css({'height': imageHeight + 'px'});
              this.events();
          }
    }

    events() {
        $(window).resize(function() {
            var images = $('.box-image');
            if (images && images.length > 0) {
                var imageHeight = images[0].height;
                var boxes = $('.content-box');

                $(boxes).each(function(i, element) {
                   $(element).css({
                     'height': imageHeight + 'px'
                   });
                });
            }
        });
    }
}

export default Images;