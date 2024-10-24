import dotenv from 'dotenv';
import { defineConfig } from 'vite';
import path from 'path';
import react from '@vitejs/plugin-react-swc';

dotenv.config();

export default defineConfig({
	server: {
		port: process.env.VITE_PORT || 5173,
	},
	publicDir: `www/app/themes/${process.env.WP_DEFAULT_THEME}/assets`,
	css: {
		lightningcss: {
			minify: true,
		},
		scss: {
			api: 'modern-compiler',
		},
	},
	resolve: {
		alias: {
			local: path.resolve(__dirname, 'assets/js'),
		},
	},
	build: {
		assetsDir: '',
		emptyOutDir: true,
		manifest: true,
		copyPublicDir: false,
		outDir: `www/app/themes/${process.env.WP_DEFAULT_THEME}/assets/dist`,
		cssMinify: 'lightningcss',
		rollupOptions: {
			input: [
				'assets/js/site.js',
				'assets/scss/site.scss',
			],
		},
	},
	plugins: [
		react(),
		{
			name: 'php',
			handleHotUpdate({ file, server }) {
				if (file.endsWith('.php')) {
					server.ws.send({ type: 'full-reload', path: '*' });
				}
			},
		},
	],
});
