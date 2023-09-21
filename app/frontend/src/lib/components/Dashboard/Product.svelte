<script>
	// @ts-nocheck

	// Import generals style
	import '$lib/styles/app.scss';

	// Import components
	import Card from '../Card.svelte';

	// Declare export variable
	export let products;
</script>

<scetion class="products">
	{#each products as product}
		<Card {...product} />
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
