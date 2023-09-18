<script>
	import '$lib/styles/app.scss';

	import { page } from '$app/stores';
	import Product from '$lib/components/DropdownCart/Product.svelte';

	const cart = undefined;
	let totalCart = 0;
	let quantityCart = 0;
</script>

<aside class="dropdown-cart js-dropdown-cart hidden">
	<header class="dropdown-cart__header">
		<h4 class="dropdown-cart__title">Panier</h4>
		<p class="dropdown-cart__numbers">{quantityCart}</p>
	</header>
	<div class="dropdown-cart__separator" />
	<ul class="dropdown-cart__lists">
		{#if cart !== undefined}
			{#each cart as item}
				<Product {...item}/>
			{/each}
		{:else}
			<li>le panier est vide</li>
		{/if}
	</ul>
	<div class="dropdown-cart__separator" />
	<footer class="dropdown-cart__footer">
		<h4 class="dropdown-cart__title">Total</h4>
		<p class="dropdown-cart__total">{totalCart} €</p>
	</footer>
	<button class="dropdown-cart__submit">Commmander</button>
</aside>

<style lang="scss">
	.dropdown-cart {
		z-index: 1000;
		position: absolute;
		top: 4rem;
		right: 1rem;
		padding: 0.75rem 1rem;
		width: 196px;
		display: flex;
		flex-direction: column;
		gap: 0.5rem;
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
			background: gainsboro;
		}
		&__separator {
			width: 100%;
			height: 1px;
			background: black;
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
			padding-block: 0.25rem;
			border-radius: 0.5rem;
			background: gainsboro;
			transition: 0.4s cubic-bezier(0.075, 0.82, 0.165, 1);
			&:hover {
				color: white;
				background: lightslategray;
			}
		}
	}
</style>
