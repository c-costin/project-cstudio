<script>
	// @ts-nocheck

	// Import generals style
	import '$lib/styles/app.scss';

	// Import component
	import Card from './Card.svelte';

	// Import module
	import { createEventDispatcher } from 'svelte';

	// Declare export variable
	export let products;

	// Declare variable
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
		padding: 1.5rem 1.75rem;
		display: grid;
		grid-template-columns: repeat(5, 1fr);
		gap: 0.75rem;
		border-radius: 0.5rem;
		background: gainsboro;
	}
</style>
