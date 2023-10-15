<script>
	// @ts-nocheck

	// Import generals
	import '$lib/styles/app.scss';

	// Import module
	import { createEventDispatcher } from 'svelte';

	let dispatch = createEventDispatcher();

	export let id;
	export let title;
	export let price;
	export let picture;
</script>

<button data-product-id={id} on:click={() => dispatch('openProduct')}>
	<article class="card">
		<img class="card__img" src={picture} alt="Image de {title}" />
		<div class="card__content">
			<h3 class="card__title">{title}</h3>
			<p class="card__price">{price} €</p>
		</div>
	</article>
</button>

<style lang="scss">
	.card {
		padding: 0.25rem 0.5rem;
		width: 100%;
		height: fit-content;
		&__img {
			width: 100%;
			aspect-ratio: 5/6;
			border-radius: 1.5rem;
			border: 3px solid transparent;
			filter: brightness(0.9);
			object-fit: cover;
			transition: 0.1s ease-in-out;
		}
		&__content {
			padding: 0.5rem 0.25rem;
			display: flex;
			justify-content: space-between;
		}
		&__content {
			font-weight: 700;
		}
		&:hover &__img {
			scale: 98%;
			border: 3px solid black;
		}
	}
	.cart-is-big {
		grid-column: span 2;
		grid-row: span 2;
	}
</style>
