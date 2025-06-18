import dotenv from 'dotenv';
import { defineConfig } from 'vite';
import internetstiftelsen from '@internetstiftelsen/vite-plugin';

dotenv.config();

export default defineConfig({
	plugins: [
		internetstiftelsen({
			input: [
				'assets/js/site.js',
				'assets/scss/site.scss',
			],
		}),
	],
});
