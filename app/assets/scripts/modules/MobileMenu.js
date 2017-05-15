import $ from 'jquery';

class MobileMenu {
	constructor() {
		this.menuIcon = $('.mobile-menu span');
        this.siteNav = $('nav.site-nav');
		this.events();
	}

	events() {
		this.menuIcon.click(this.toggleMenu.bind(this));
	}

	toggleMenu() {
		this.siteNav.toggle('swing');
	}
    
}

export default MobileMenu;
