<script lang="ts">
	// @ts-nocheck

	// Import generals style
	import '$lib/styles/app.scss';

	// Import utils
	import { UptoCapitalizer } from '$lib/js/utils.js';

	// Declare export variable
	export let data: LayoutServerData;

	let categories = data.categories;
</script>

<section class="categories">
	{#each categories as category, i (category.id)}
		<div class="categories__row">
			<h3>{UptoCapitalizer(category.name)}</h3>
			<div class="categories__actions">
				<button class="categories__btn">supprimer</button>
				<button class="categories__btn">editer</button>
			</div>
		</div>
		{#if categories.length - 1 !== i}
			<div class="categories__separator" />
		{/if}
	{/each}
</section>

<style lang="scss">
	.categories {
		padding: 1rem 1.5rem;
		margin-top: 1rem;
		width: 100%;
		height: fit-content;
		display: flex;
		flex-direction: column;
		gap: 1rem;
		border-radius: 0.5rem;
		background: gainsboro;
		&__row {
			display: flex;
			justify-content: space-between;
		}
		&__actions {
			display: flex;
			gap: 0.5rem;
		}
		&__btn {
			padding: 0.25rem 0.75rem;
		}
		&__separator {
			width: 100%;
			height: 1px;
			background: darkgray;
		}
	}
</style>
