<script>
	// @ts-nocheck

	// Import generals style
	import '$lib/styles/app.scss';

	// Import module
	import { page } from '$app/stores';
	import { findAllProductById } from '$lib/js/request.js';

	// Import components
	import Header from '$lib/components/Header.svelte';
	import Product from '$lib/components/Cart/Product.svelte';
	import Footer from '$lib/components/Footer.svelte';


	// Declare variables
	let total;
	let productsTotal = [];
	let totalCheckout = 0;
	
	// Handle statements
	$: products = $page.data.session.cart;
	$: totalCheckout = productsTotal.reduce((accumulator, currentValue) => accumulator + currentValue, 0);
</script>

<svelte:head>
	<title>Panier | C-Studio - Plateform de vente en ligne d'oeuvre d'art</title>
</svelte:head>

<div class="wrapper">
	<Header />
	<main class="main">
		<section class="cart">
			<h2 class="cart__title">Panier</h2>
			<div class="cart__separator" />
			{#if products.length >= 1}
				{#each products as item, i (item.id)}
					{#await findAllProductById(item.id) then product}
						<Product {...product} index={i} bind:total={productsTotal[i]} />
						<div class="cart__separator" />
					{/await}
				{/each}
			{:else}
				<p class="cart__empty">le panier est vide</p>
				<div class="cart__separator" />
			{/if}
			<div class="cart__resume">
				<h3 class="cart__subtitle">Total</h3>
				<p class="cart__price">{totalCheckout} €</p>
			</div>
			<button class="cart__checkout">commander</button>
		</section>
	</main>
</div>

<Footer />

<style lang="scss">
	@use '../../lib/styles/variables' as *;
	.cart {
		margin-top: 3rem;
		margin-inline: auto;
		width: 100%;
		max-width: 512px;
		display: flex;
		flex-direction: column;
		gap: 0.75rem;
		&__separator {
			width: 100%;
			height: 1px;
			border-radius: 0.25rem;
			background: gray;
		}
		&__empty {
			margin-block: 3rem;
			width: 100%;
			text-align: center;
		}
		&__resume {
			padding: 0.5rem 0.75rem;
			display: flex;
			justify-content: space-between;
			align-items: center;
		}
		&__checkout {
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
	}

	@media screen and (min-width: 768px) {
		.cart {
			&__checkout {
				width: 50%;
				align-self: flex-end;
			}
		}
	}
</style>
