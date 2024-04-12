# Install SASS to SvelteKit

> After create project

### Add _vitePreprocess_ in `svelte.config.js`

[@see: SvelteKit Preprocessors](https://kit.svelte.dev/docs/integrations#preprocessors-vitepreprocess)

```js
// svelte.config.js
import { vitePreprocess } from "@sveltejs/kit/vite";

const config = {
    kit: {
        adapter: adapter()
    },
    preprocess: [vitePreprocess()]
};

export default config;
```

### Add _variables_ into `vite.config.js`

[@see: Vite documentation](https://vitejs.dev/config/shared-options.html#css-preprocessoroptions)

```js
// vite.config.js
export default defineConfig({
  css: {
    preprocessorOptions: {
      sass: {
        // Define all files
        additionalData: `
          @import '$lib/sass/variables as *'
        `,
      },
    },
  },
});
```
