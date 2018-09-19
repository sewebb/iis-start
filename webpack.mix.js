const mix = require('laravel-mix');

mix.webpackConfig({
	resolve: {
		modules: [
			path.resolve(__dirname, 'node_modules')
		]
	},
	module: {
		rules: [{
			test: /\.js?$/,
			use: [{
				loader: 'babel-loader',
				options: mix.config.babel()
			}]
		}]
	}
});

mix
	.js('./resources/js/site.js', './assets/js/site.js')
	.sass('./resources/scss/site.scss', './assets/css')
	.browserSync('iis-start.test')
	.version()
	.setPublicPath('./');
