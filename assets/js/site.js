/**
 * Example of codespliting styleguide components.
 * Lazy import the component class instead of globally importing the module default.
 * To make this work with dynamically loaded content you need to add an observer
 */
const forms = document.querySelectorAll('[data-form]');

if (forms.length) {
	import('iis-styleguide/dist/molecules/form/Form')
		.then(({ default: Form }) => forms.forEach((element) => new Form(element)))
		.catch((ex) => {
			console.warn('Could not load the Form component', ex);
		});
}

/**
 * The following will auto initialize forms,
 * but will be imported even if there's no forms in the page
 *
 * import 'iis-styleguide/dist/molecules/form';
 */

/**
 * Main entry point for the javascript bundle.
 */
console.log('🎉 IIS Start is up and running');
