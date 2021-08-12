const mix = require('laravel-mix');
const config = require('./webpack.config');

mix.webpackConfig(config);

mix
	.js('./assets/js/site.js', 'assets/js/site.js')
	.sass('./assets/scss/site.scss', 'assets/css/site.css')
	// .browserSync('iis.test')
	.version()
	.setPublicPath('./www/app/themes/iis-start/')
	.sourceMaps(true, 'source-map');
