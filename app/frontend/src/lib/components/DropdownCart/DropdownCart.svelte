<script>
	// Import generals style
	import '$lib/styles/app.scss';

	// Import module
	import { page } from '$app/stores';

	// Import component
	import Product from '$lib/components/DropdownCart/Product.svelte';
	import { findAllProductById } from '$lib/js/request.js';

	let totalCart = 0;
	let quantityCart = 0;
	const cart = $page.data.session.cart;
</script>

<aside class="cart">
	<header class="cart__header">
		<h4 class="cart__title">Panier</h4>
		<p class="cart__numbers">{cart.length}</p>
	</header>
	<div class="cart__separator" />
	<ul class="cart__lists">
		{#if cart.length !== 0}
			{#each cart as item (item.id)}
				{#await findAllProductById(item.id) then product}
					<Product {...product} />
				{/await}
			{/each}
		{:else}
			<li class="cart__empty">le panier est vide</li>
		{/if}
	</ul>
	<div class="cart__separator" />
	<footer class="cart__footer">
		<h4 class="cart__title">Total</h4>
		<p class="cart__total">{totalCart} €</p>
	</footer>
	<a href="/panier" class="cart__submit">commmander</a>
</aside>

<style lang="scss">
	@use '../../styles/variables' as *;
	.cart {
		z-index: 1000;
		position: absolute;
		top: 4rem;
		right: 1rem;
		padding: 0.75rem 1rem;
		width: 196px;
		display: flex;
		flex-direction: column;
		gap: 0.75rem;
		border-radius: 0.5rem;
		border: 1px solid rgba(255, 255, 255, 0.15);
		backdrop-filter: blur(3.1px);
		-webkit-backdrop-filter: blur(3.1px);
		box-shadow: 0 4px 30px rgba(0, 0, 0, 0.15);
		background: rgba(255, 255, 255, 0.9);
		&__header {
			display: flex;
			justify-content: space-between;
			align-items: center;
		}
		&__numbers {
			padding: 0.05rem 0.5rem;
			border-radius: 100%;
			font-weight: 700;
			color: $color-black;
			background: $color-green;
		}
		&__separator {
			width: 100%;
			height: 1px;
			background: $color-black;
		}
		&__lists {
			display: flex;
			flex-direction: column;
			gap: 1rem;
			list-style: none;
		}
		&__footer {
			display: flex;
			justify-content: space-between;
			align-items: center;
		}
		&__submit {
			margin-top: 0.25rem;
			padding: 0.25rem;
			font-weight: 700;
			font-size: 1.1rem;
			text-align: center;
			border-radius: 0.5rem;
			background: $color-green;
			transition: 0.4s cubic-bezier(0.075, 0.82, 0.165, 1);
			&:hover {
				color: $color-white;
			}
		}
		&__empty {
			margin-block: 1rem;
			width: 100%;
			text-align: center;
		}
	}
</style>
