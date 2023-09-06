<script>
	import '$lib/styles/app.scss';
	import iconMinus from '$lib/icons/minus.svg';
	import iconPlus from '$lib/icons/plus.svg';

	// Declare variables
	let quantity = 1;
	let price = 1200;

	export let dataId = 0;
	export let total = price;

	// Declare functions
	const increment = () => quantity++;
	const decrement = () => {
		if (quantity <= 1) {
			return;
		}
		quantity--;
	};

	// Handle statements
	$: total = quantity * price;
</script>

<article class="cart-product" data-id={dataId}>
	<img class="cart-product__img" src="" alt="" />
	<div class="cart-product__container-center">
		<h3 class="cart-product__name">Nature</h3>
		<div class="cart-product___quantity">
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
		<p class="cart-product___price">{total} €</p>
		<button class="cart-product___btn-delete">
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
			width: 6rem;
			aspect-ratio: 4/3;
			border-radius: 0.5rem;
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
		&___btn-delete {
			padding: 0.25rem;
			background: none;
		}
		// &___number {
		// 	padding: 0.25rem 0.5rem;
		// 	text-align: center;
		// 	background: gainsboro;
		// }
	}

	.cart-product___quantity {
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
