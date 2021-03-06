const mix = require('laravel-mix');
const path = require('path');
const StyleLintPlugin = require('stylelint-webpack-plugin');
const Dotenv = require('dotenv-webpack');

mix.webpackConfig({
	module: {
		rules: [
			{
				enforce: 'pre',
				test: /\.js$/,
				exclude: /node_modules/,
				loader: 'eslint-loader',
			},
		],
	},
	plugins: [
		new StyleLintPlugin({
			files: 'assets/**/*.scss',
		}),
		new Dotenv(),
	],
	resolve: {
		modules: [
			path.resolve(__dirname, 'node_modules'),
		],
		alias: {
			local: path.resolve(__dirname, 'assets/js'),
		},
	},
	output: {
		chunkFilename: 'assets/js/chunks/[name].chunk.js?id=[chunkhash]',
		publicPath: '/app/themes/iis-start/',
	},
});

mix
	.js('./assets/js/site.js', 'assets/js/site.js')
	.sass('./assets/scss/site.scss', 'assets/css/site.css')
	// .browserSync('iis.test')
	.version()
	.setPublicPath('./www/app/themes/iis-start/')
	.sourceMaps(true, 'source-map');
