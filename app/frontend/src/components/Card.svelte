<script>
	import '$lib/styles/app.scss';
	export let isBig = false;
</script>

<a href="/" class="product-link {isBig ? 'cart-is-big' : ''}">
	<article class="card">
		<!-- svelte-ignore a11y-img-redundant-alt -->
		<img class="card__img" src="/" alt="image" />
		<div class="card__content">
			<h3 class="card__title">Produit</h3>
			<p class="card__price">2450€</p>
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
