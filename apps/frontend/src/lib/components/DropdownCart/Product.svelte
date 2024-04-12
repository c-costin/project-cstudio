<script>
	// @ts-nocheck
	
	// Import module
	// import { page } from '$app/stores';
	import { enhance } from '$app/forms';

	// Import icons
	import iconCancel from '$lib/icons/cancel.svg';
	import iconMinus from '$lib/icons/minus.svg';
	import iconPlus from '$lib/icons/plus.svg';

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
	export let quantity;
	export let total = price;

	// Declare functions
	const increment = () => quantity++;
	const decrement = () => {
		if (quantity === 1) return;
		quantity--;
	};

	// Handle statement
	$: total = quantity * price;
</script>

<li class="dropdownCartProduct">
	<form action="/panier?/remove" method="post" style="z-index: 10010;" use:enhance>
		<input type="hidden" name="id" value="{id}">
		<button >
			<img src={iconCancel} alt="Icon diminution da la quantité" class="dropdownCartProduct__icon" />
		</button>
	</form>
	<!-- <a href="/produit/{id}" class="dropdownCartProduct__link"> -->
		<article class="dropdownCartProduct__container">
			<div class="dropdownCartProduct__top">
				<img class="dropdownCartProduct__img" src={picture} alt="Image de l'oeuvre {title}" />
				<h3 class="dropdownCartProduct__title">{title}</h3>
			</div>
			<div class="dropdownCartProduct__bottom">
				<div class="dropdownCartProduct__quantity">
					<button on:click={decrement}>
						<img src={iconMinus} alt="Icon diminution da la quantité" class="dropdownCartProduct__icon" />
					</button>
					<p class="dropdownCartProduct__number">{quantity}</p>
					<button on:click={increment}>
						<img src={iconPlus} alt="Icon ajout da la quantité" class="dropdownCartProduct__icon" />
					</button>
				</div>
				<p class="dropdownCartProduct__price">{total} €</p>
			</div>
		</article>
	<!-- </a> -->
</li>

<style lang="scss">
	.dropdownCartProduct {
		width: 196px;
		&__container {
			width: 100%;
			display: flex;
			flex-direction: column;
			gap: 0.5rem;
		}
		&__top {
			display: flex;
			justify-content: space-between;
		}
		&__img {
			width: 4rem;
			aspect-ratio: 4/3;
			border-radius: 0.25rem;
			background: lightslategray;
			object-fit: cover;
		}
		&__bottom {
			display: flex;
			justify-content: space-between;
		}
		&__quantity {
			display: flex;
			align-items: center;
			gap: 0.5rem;
		}
	}
</style>
