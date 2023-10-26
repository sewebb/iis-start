/**
 * The following will auto initialize basic functionality
 * like accordions, context-menus, tab highlighting etc..
 *
 * import '@internetstiftelsen/styleguide';
 */
import '@internetstiftelsen/styleguide';

/**
 * Example of codespliting styleguide components.
 * Lazy import the component class instead of globally importing the module default.
 * To make this work with dynamically loaded content you need to add an observer
 */
const buttons = document.querySelectorAll('[data-button]');

if (buttons.length) {
	import('@internetstiftelsen/styleguide/dist/atoms/button/Button')
		.then((Button) =>
			buttons.forEach((element) => new Button(element).start()),
		)
		.catch((ex) => {
			console.warn('Could not load the Forms component', ex);
		});
}

/**
 * Main entry point for the javascript bundle.
 */
console.log('🎉 IIS Start is up and running');

if (process.env.BUGSNAG_JS_API_KEY) {
	import('@bugsnag/js').then(({ default: Bugsnag }) => {
		Bugsnag.start({
			apiKey: process.env.BUGSNAG_JS_API_KEY,
			notifyReleaseStages: ['production', 'stage'],
			releaseStage: process.env.WP_ENV,
			appVersion: VERSION, // Set by webpack
			collectUserIp: false,
		});
	});
} else {
	console.warn(
		'Logging is disabled. Set WP_ENV and BUGSNAG_JS_API_KEY in your .env file.',
	);
}
