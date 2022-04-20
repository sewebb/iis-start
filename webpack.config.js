const StyleLintPlugin = require('stylelint-webpack-plugin');
const ESLintPlugin = require('eslint-webpack-plugin');
const Dotenv = require('dotenv-webpack');
const path = require('path');
const webpack = require('webpack');
const { BugsnagBuildReporterPlugin } = require('webpack-bugsnag-plugins');

const devMode = process.env.NODE_ENV !== 'production';
const plugins = [
	new StyleLintPlugin({
		files: 'assets/**/*.scss',
	}),
	new ESLintPlugin({
		extensions: ['js', 'jsx'],
	}),
	new Dotenv(),
];

let appVersion = 'dev';

if (!devMode) {
	const date = new Date();
	const lZero = (num) => (`0${num}`).substr(-2);

	appVersion = (
		date.getUTCFullYear()
		+ lZero(date.getUTCMonth() + 1)
		+ lZero(date.getUTCMonth() + 1)
		+ lZero(date.getHours() + 1)
		+ lZero(date.getMinutes() + 1)
	);

	plugins.push(new BugsnagBuildReporterPlugin({
		apiKey: process.env.BUGSNAG_API_KEY,
		appVersion,
	}));
}

plugins.push(new webpack.DefinePlugin({
	VERSION: JSON.stringify(appVersion),
}));

module.exports = {
	plugins,
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
};
