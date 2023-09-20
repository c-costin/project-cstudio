<script>
	// @ts-nocheck

	import '$lib/styles/app.scss';
	import Header from '$lib/components/Header.svelte';
	import Footer from '$lib/components/Footer.svelte';
	import Product from '$lib/components/Cart/Product.svelte';
	import { page } from '$app/stores';
	import { findAllProductById } from '$lib/js/request.js';

	// Declare variables
	let products = $page.data.session.cart;
	let total;
	let productsTotal = [];
	let totalCheckout = 0;

	// Handle statements
	$: totalCheckout = productsTotal.reduce((accumulator, currentValue) => accumulator + currentValue, 0);
</script>

<svelte:head>
	<title>Panier | C-Studio - Plateform de vente en ligne d'oeuvre d'art</title>
</svelte:head>

<div class="wrapper">
	<Header />
	<main class="main">
		<section class="cart-container">
			<h2>Panier</h2>
			<div class="cart__separator" />
			{#each products as item, i (item.id)}
				{#await findAllProductById(item.id) then product}
					<Product {...product} index={i} bind:total={productsTotal[i]} />
					<div class="cart__separator" />
				{/await}
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
	@use '../../lib/styles/variables' as *;
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
		padding: 0.5rem 1.5rem;
		font-weight: 700;
		font-size: 1.25rem;
		border-radius: 0.5rem;
		background: $color-green;
		transition: 0.1s ease-in-out;
		&:hover {
			color: $color-white;
		}
	}

	@media screen and (min-width: 768px) {
		.cart__btn-checkout {
			width: 50%;
			align-self: flex-end;
		}
	}
</style>
