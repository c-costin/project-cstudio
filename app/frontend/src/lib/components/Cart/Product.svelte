<script>
// @ts-nocheck

	// Import generals style
	import '$lib/styles/app.scss';

	// Import module
	import { page } from '$app/stores';

	// Import icons
	import iconMinus from '$lib/icons/minus.svg';
	import iconPlus from '$lib/icons/plus.svg';

	// Declare export variables
	export let index;
	export let id;
	export let title;
	export let price;
	export let picture;
	export let description;
	export let dimensions;
	export let releaseDate;
	export let artist;
	export let type;
	export let categories;
	export let total = price;

	// Declare variables
	let quantity = $page.data.session.cart[index].quantity;

	// Declare functions
	const increment = () => quantity++;
	const decrement = () => {
		if (quantity <= 1) return;
		quantity--;
	};

	// Handle statements
	$: total = quantity * price;
</script>

<article class="cart-product" data-id={index}>
	<img class="cart-product__img" src="{picture}" alt="Image de l'oeuvre {title}" />
	<div class="cart-product__container-center">
		<h3 class="cart-product__name">{title}</h3>
		<div class="cart-product__quantity">
			<button on:click={decrement}>
				<img src={iconMinus} alt="Icon diminution da la quantité" class="product__icon" />
			</button>
			<p class="cart-product__number">{quantity}</p>
			<button on:click={increment}>
				<img src={iconPlus} alt="Icon ajout da la quantité" class="product__icon" />
			</button>
		</div>
	</div>
	<div class="cart-product__container-end">
		<p class="cart-product__price">{total} €</p>
		<button class="cart-product__btn-delete">
			<i class="iconoir-delete-circle cart-product__icon" />
		</button>
	</div>
</article>

<style lang="scss">
	.cart-product {
		margin-inline: auto;
		padding: 0.5rem;
		width: 100%;
		max-width: 384px;
		height: fit-content;
		display: flex;
		justify-content: space-between;
		gap: 1rem;
		&__img {
			width: 8rem;
			aspect-ratio: 5/5;
			border-radius: 0.5rem;
			object-fit: cover;
			background: lightslategray;
		}
		&__container-center {
			display: flex;
			flex-direction: column;
			justify-content: space-between;
		}
		&__name {
			height: fit-content;
		}
		&__icon {
			font-size: 1.2rem;
		}
		&__container-end {
			display: flex;
			flex-direction: column-reverse;
			justify-content: space-between;
			align-items: flex-end;
		}
		&__btn-delete {
			padding: 0.25rem;
			background: none;
		}
		// &___number {
		// 	padding: 0.25rem 0.5rem;
		// 	text-align: center;
		// 	background: gainsboro;
		// }
	}

	.cart-product__quantity {
		display: flex;
		gap: 0.75rem;
	}

	@media screen and (min-width: 768px) {
		.cart-product {
			max-width: 512px;
			align-items: center;
			&__container-center {
				flex-direction: row;
				align-items: center;
				gap: 2rem;
			}
			&__container-end {
				flex-direction: row;
				align-items: center;
				gap: 2rem;
			}
		}
	}
</style>
