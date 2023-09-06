<script>
	import '$lib/styles/app.scss';
	import Header from '../../components/Header.svelte';
	import Footer from '../../components/Footer.svelte';
	import Product from '../../components/Cart/Product.svelte';

	let products = [0, 1, 2];
    
</script>

<div class="wrapper">
	<Header />
	<main class="main">
		<section class="cart-container">
			<h2>Panier</h2>
			<div class="cart__separator" />
			{#each products as product}
				<Product />
			{/each}
			<div class="cart__separator" />
			<div class="cart-total">
				<h3 class="cart-total__title">Total</h3>
				<p class="cart-total__price">!!!!!1€!!!!!</p>
			</div>
			<button class="cart__btn-checkout">Commander</button>
		</section>
	</main>
</div>

<Footer />

<style lang="scss">
	.cart-container {
		margin-inline: auto;
		width: 100%;
		max-width: 512px;
		display: flex;
		flex-direction: column;
		gap: 0.75rem;
	}

	.cart__separator {
		width: 100%;
		height: 1px;
		border-radius: 0.25rem;
		background: gray;
	}

	.cart-total {
		padding: 0.5rem 0.75rem;
		display: flex;
		justify-content: space-between;
		align-items: center;
	}

	.cart__btn-checkout {
		padding: 0.75rem 1rem;
		border-radius: 0.5rem;
	}

	// .cart-product {
	// 	margin-inline: auto;
	// 	padding: 0.5rem;
	// 	width: 100%;
	// 	max-width: 384px;
	// 	height: fit-content;
	// 	display: flex;
	// 	justify-content: space-between;
	// 	gap: 1rem;
	// 	&__img {
	// 		width: 6rem;
	// 		aspect-ratio: 4/3;
	// 		border-radius: 0.5rem;
	// 		background: lightslategray;
	// 	}
	// 	&__container-center {
	// 		display: flex;
	// 		flex-direction: column;
	// 		justify-content: space-between;
	// 	}
	// 	&__name {
	// 		height: fit-content;
	// 	}
	// 	&__icon {
	// 		font-size: 1.2rem;
	// 	}
	// 	&__container-end {
	// 		display: flex;
	// 		flex-direction: column-reverse;
	// 		justify-content: space-between;
	// 		align-items: flex-end;
	// 	}
	// 	&___btn-delete {
	// 		padding: 0.25rem;
	// 		background: none;
	// 	}
	// 	&___number {
	// 		padding: 0.25rem 0.5rem;
	// 		text-align: center;
	// 		background: gainsboro;
	// 	}
	// }

	// .cart-product___quantity {
	// 	display: flex;
	// 	gap: 0.75rem;
	// }

	@media screen and (min-width: 768px) {
		.cart__btn-checkout {
			width: 50%;
			align-self: flex-end;
		}
	}
	// 	.cart-product {
	// 		max-width: 512px;
	// 		align-items: center;
	// 		&__container-center {
	// 			flex-direction: row;
	// 			align-items: center;
	// 			gap: 2rem;
	// 		}
	// 		&__container-end {
	// 			flex-direction: row;
	// 			align-items: center;
	// 			gap: 2rem;
	// 		}
	// 	}
	// }
</style>
