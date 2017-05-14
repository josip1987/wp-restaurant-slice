import $ from 'jquery';

class MobileMenu {
	constructor() {
		this.menuIcon = $('.mobile-menu a');
        this.siteNav = $('nav.site-nav');
		this.events();
	}

	events() {
		this.menuIcon.click(this.toggleMenu.bind(this));
	}

	toggleMenu() {
		this.siteNav.toggle('slow');
	}
    
}

export default MobileMenu;
