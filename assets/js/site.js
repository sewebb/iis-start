import '@internetstiftelsen/styleguide/dist/components';

/**
 * Example of codespliting styleguide components.
 * Lazy import the component class instead of globally importing the module default.
 * To make this work with dynamically loaded content you need to add an observer
 */
const buttons = document.querySelectorAll('[data-button]');

if (buttons.length) {
	import('@internetstiftelsen/styleguide/dist/atoms/button/button')
		.then((Button) => buttons.forEach((element) => (new Button(element)).start()))
		.catch((ex) => {
			console.warn('Could not load the Form component', ex);
		});
}

/**
 * The following will auto initialize basic functionality
 * like accordions, context-menus, tab highlighting etc..
 *
 * import '@internetstiftelsen/styleguide';
 */

/**
 * Main entry point for the javascript bundle.
 */
console.log('🎉 IIS Start is up and running');
