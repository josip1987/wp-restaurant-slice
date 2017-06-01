import MobileMenu from './modules/MobileMenu';
import Images from './modules/Images';
import Maps from './modules/Maps';

var mobileMenu = new MobileMenu();
var images = new Images();
var maps = new Maps();

// gallery stuff

(function ($, root, undefined) {
    $(function() {
        'use strict';
        
        // must use data-fancybox attr for grouping

        $('.gallery-item').each(function(index) {
            var rel = "group"+$(this).attr('id');
            $('.gallery-item a').addClass('fancybox').attr('data-fancybox', rel);
        });
        $('.fancybox').fancybox(); 
    });
})(jQuery, this);

