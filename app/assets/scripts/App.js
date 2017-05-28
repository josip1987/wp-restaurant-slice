import MobileMenu from './modules/MobileMenu';
import Images from './modules/Images';

var mobileMenu = new MobileMenu();
var images = new Images();

(function ($, root, undefined) {
    $(function() {
        'use strict';
        
        jQuery('.gallery .gallery-item a').fancybox({
            openEffect: 'fade'
        });
    });
})(jQuery, this);

console.log('sdsdg');