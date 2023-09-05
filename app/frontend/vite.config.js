import { sveltekit } from '@sveltejs/kit/vite';
import { defineConfig } from 'vite';

export default defineConfig({
	plugins: [sveltekit()],
	css: {
		preprocessorOptions: {
			scss: {
				additionalData: `
					@use '$lib/styles/variables as vr'
					@use '$lib/styles/mixins as mx'
				`
			}
		}
	}
});
