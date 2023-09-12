<script>
	import '$lib/styles/app.scss';

	export let isBig = false;

	export let id;
	export let title;
	export let artist;
	export let price;
	export let picture;
	export let description;
	export let dimensions;
	export let releaseDate;
</script>

<a href="/produit/{id}" class="product-link {isBig ? 'cart-is-big' : ''}">
	<article class="card" data-product-id="{id}">
		<!-- svelte-ignore a11y-img-redundant-alt -->
		<img class="card__img" src="{picture}" alt="Image de {title}" />
		<div class="card__content">
			<h3 class="card__title">{title}</h3>
			<p class="card__price">{price}</p>
		</div>
	</article>
</a>

<style lang="scss">
	.card {
		padding: 0.25rem 0.5rem;
		width: 100%;
		height: fit-content;
		&__img {
			width: 100%;
			aspect-ratio: 5/5;
			border-radius: 0.5rem;
			border: 2px solid transparent;
			background: lightslategray;
		}
		&__content {
			padding: 0.5rem 0.25rem;
			display: flex;
			justify-content: space-between;
		}
		&:hover &__img {
			border: 2px solid black;
		}
	}
	.cart-is-big {
		grid-column: span 2;
		grid-row: span 2;
	}
</style>
