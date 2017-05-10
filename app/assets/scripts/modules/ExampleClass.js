import $ from 'jquery';

class ExampleClass {
	constructor() {
		this.heading = $('h1');
		this.events();
	}

	events() {
		this.heading.click(this.exampleFunction.bind(this));
	}

	exampleFunction() {
		this.heading.hide();
		alert('Bundle works!');
	}
}

export default ExampleClass;
