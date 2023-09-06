<script>
	// @ts-nocheck

	import '$lib/styles/app.scss';
	import Header from '../../components/Header.svelte';
	import Footer from '../../components/Footer.svelte';
	import Product from '../../components/Cart/Product.svelte';

	// Declare variables
	let products = [0, 1, 2, 3];
	let total;
	let productsTotal = [];
	let totalCheckout = 0;

	// Handle statements
	$: totalCheckout = productsTotal.reduce((accumulator, currentValue) => accumulator + currentValue, 0);

</script>

<div class="wrapper">
	<Header />
	<main class="main">
		<section class="cart-container">
			<h2>Panier</h2>
			<div class="cart__separator" />
			{#each products as product, i}
				<Product dataId={i} bind:total={productsTotal[i]} />
				<div class="cart__separator" />
			{/each}
			<div class="cart-total">
				<h3 class="cart-total__title">Total</h3>
				<p class="cart-total__price">{totalCheckout} €</p>
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

	@media screen and (min-width: 768px) {
		.cart__btn-checkout {
			width: 50%;
			align-self: flex-end;
		}
	}
</style>
