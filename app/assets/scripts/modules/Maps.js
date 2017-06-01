import $ from 'jquery';

class Maps {
	constructor() {
        this.breakpoint = 768;
		this.map = $('#map');
            if ($(document).width() >= this.breakpoint) {
                this.displayMap(0);
            } else {
                this.displayMap(300);
            }
	}
    
    // control the map height

	displayMap(value) {
		if(value == 0) {
            var locationSection = $('.location-reservation');
            var locationHeight = locationSection.height();
            $(this.map).css({'height': locationHeight});
        } else {
            $(this.map).css({'height': value});
        }
	}
    
}

export default Maps;
