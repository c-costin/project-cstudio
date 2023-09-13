<script>
	import '$lib/styles/app.scss';
	import Header from '../../../components/Header.svelte';
	import Footer from '../../../components/Footer.svelte';

	import iconMinus from '$lib/icons/minus.svg';
	import iconPlus from '$lib/icons/plus.svg';

	/** @type {import('./$types').PageData} */
	export let data;

	let product = Object.entries(data)
	let quantity = 1;
	let price = product[4][1];
	$: Calculatedprice = quantity * price;

	const increment = () => quantity++;
	const decrement = () => {
		if (quantity === 1) {
			return;
		}
		quantity--;
	};
</script>

<svelte:head>
	<title>C-Studio - Product</title>
</svelte:head>

<div class="wrapper">
	<Header />

	<main class="main">
		<section class="product">
			<!-- svelte-ignore a11y-img-redundant-alt -->
			<img class="product__img" src="{product[5][1]}" alt="Image du produit - " />
			<div class="product__info">
				<h1 class="product__type">{product[8][1].name}</h1>
				<h2 class="product__title">{product[1][1]}</h2>
				<h3 class="product__category">{product[9][1][0].name}</h3>
				<summary class="product__description">
					{product[2][1]}
				</summary>

				<div class="product__purchase">
					<div class="product__quantity">
						<button on:click={decrement}>
							<img src="{iconMinus}" alt="Icon diminution da la quantité" class="product__icon">
						</button>
						<p class="product__number">{quantity}</p>
						<button on:click={increment}>
							<img src="{iconPlus}" alt="Icon ajout da la quantité" class="product__icon">
						</button>
					</div>
					<div class="product__price">
						<p>{Calculatedprice}€</p>
					</div>
				</div>
				<button class="product__addToCart">Ajouter au panier</button>
			</div>
		</section>
	</main>
</div>

<Footer />

<style lang="scss">
	.product {
		display: flex;
		flex-direction: column;
		margin-top: 5rem;
		max-width: 892px;
		margin-inline: auto;

		&__info {
			display: flex;
			flex-direction: column;
			gap: 0.75rem;
		}

		&__img {
			width: 100%;
			height: auto;
			aspect-ratio: 5/4;
			border-radius: 0.25rem;
			background: lightslategrey;
			margin-bottom: 2rem;
		}

		&__purchase {
			display: flex;
			align-items: center;
			justify-content: space-between;
			gap: 0.5rem;
		}

		&__price {
			font-size: 1.2rem;
			font-weight: bold;
		}

		&__quantity {
			width: fit-content;
			display: flex;
			align-items: center;
			justify-content: space-between;
			gap: 1rem;
			margin: 1rem 0;
		}

		&__number {
			border: solid 1px lightgray;
			border-radius: 5%;
			background-color: lightgray;
			padding: 0 0.3rem;
		}

		&__addToCart {
			width: 100%;
		}
	}

	@media screen and (min-width: 768px) {
		.product {
			width: 80%;
			margin-top: 3rem;
		}
	}

	@media screen and (min-width: 992px) {
		.product {
			flex-direction: row;
			gap: 2rem;
			&__info {
				width: 50%;
			}
			&__img {
				margin: 0;
				width: 75%;
			}
		}
	}
</style>
