const mix = require('laravel-mix');
const path = require('path');
const WebpackShellPlugin = require('webpack-shell-plugin');

mix.webpackConfig({
	plugins: [
		new WebpackShellPlugin({
			onBuildEnd: ['yarn run eslint', 'yarn run sasslint'],
			dev: false,
		}),
	],
	resolve: {
		modules: [
			path.resolve(__dirname, 'node_modules'),
		],
	},
	module: {
		rules: [
			{
				test: /\.js?$/,
				use: [{
					loader: 'babel-loader',
					options: mix.config.babel(),
				}],
			},
		],
	},
});

mix
	.js('./assets/js/site.js', './www/app/themes/iis-start/assets/js/site.js')
	.sass('./assets/scss/site.scss', './www/app/themes/iis-start/assets/css')
	//.browserSync('iis-start.test')
	.version()
	.setPublicPath('./www/app/themes/iis-start/');
