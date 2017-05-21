import $ from 'jquery';

class Fluidbox {
	constructor() {
		this.galleryItem = $('.gallery a');                
		this.events();
	}

	events() {
        this.galleryItem.each(function() {
            $(this).attr({'data-fluidbox': ''});
        });
        
        if($('[data-fluidbox]').length > 0) {
            $('[data-fluidbox]').fluidbox();
        }

	}
}

export default Fluidbox;