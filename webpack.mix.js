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
	.js('./resources/js/site.js', './assets/js/site.js')
	.sass('./resources/scss/site.scss', './assets/css')
	//.browserSync('iis-start.test')
	.version()
	.setPublicPath('./');
