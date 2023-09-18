<script>
	import '$lib/styles/app.scss';
	import Header from '../../../components/Header.svelte';
	import Footer from '../../../components/Footer.svelte';

	import iconMinus from '$lib/icons/minus.svg';
	import iconPlus from '$lib/icons/plus.svg';

	/** @type {import('./$types').PageData} */
	export let data;

	const product = data.product;
	console.log(product)
	let quantity = 1;
	let price = product.price;
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
			<img class="product__img" src={product.picture} alt="Image du produit - " />
			<div class="product__info">
				<h2 class="product__type">{product.type.name}</h2>
				<h1 class="product__title">{product.title}</h1>
				<h3 class="product__category">{product.categories[0].name}</h3>
				<summary class="product__description">
					{product.description}
				</summary>
				<div class="product__caracteristics">
				<p class="product__dimensions">Dimensions:{product.dimensions}</p>
				<p class="product__date">Création:{product.releaseDate}<p>
				</div>

				<div class="product__purchase">
					<div class="product__quantity">
						<button on:click={decrement}>
							<img src={iconMinus} alt="Icon diminution da la quantité" class="product__icon" />
						</button>
						<p class="product__number">{quantity}</p>
						<button on:click={increment}>
							<img src={iconPlus} alt="Icon ajout da la quantité" class="product__icon" />
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
	@use '../../../lib/styles/variables' as *;
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
		&__caracteristics {
			display:flex;
			justify-content: space-between;
		}
		&__img {
			width: 100%;
			max-width: 540px;
			height: auto;
			margin-bottom: 2rem;
			object-fit: cover;
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
		&__icon {
			border-radius: 100%;
			border: 2px solid $color-black;
		}
		&__number {
			font-size: 1.4rem;
			font-weight: 700;
		}
		&__addToCart {
			padding-block: 1rem;
			width: 100%;
			font-weight: 700;
			font-size: 1.25rem;
			border-radius: 0.5rem;
			background: $color-green;
			transition: 0.15s ease-in-out;
			&:hover {
				color: $color-white;
			}
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
