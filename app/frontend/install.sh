#!/bin/bash

# Create sveltekit project
pnpm create svelte@latest .

# Install dependancies
pnpm install

# Install SASS to DEV
pnpm add -D sass