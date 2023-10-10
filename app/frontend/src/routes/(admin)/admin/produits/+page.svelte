<script lang="ts">
	// @ts-nocheck

	// Import generals style
	import '$lib/styles/app.scss';

	// Import component
	import Card from '$lib/components/Admin/Card.svelte';

	// Import module
	import { createEventDispatcher } from 'svelte';

	export let data: LayoutServerData;

    let products = data.products.slice(0, 15);
	let dispatch = createEventDispatcher();
</script>

<scetion class="products">
	{#each products as product (product.id)}
		<Card {...product} on:openProduct={() => dispatch('openProduct', product.id)} />
	{/each}
</scetion>

<style lang="scss">
	.products {
		margin-top: 1rem;
		padding: 0.75rem;
		display: grid;
		grid-template-columns: repeat(5, 1fr);
		gap: 0.25rem;
		border-radius: 0.5rem;
		background: gainsboro;
	}
</style>
