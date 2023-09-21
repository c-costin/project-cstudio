<script>
	// @ts-nocheck

	// Import components
	import Header from '$lib/components/Header.svelte';
	import Product from '$lib/components/Dashboard/Product.svelte';
	import Order from '$lib/components/Dashboard/Order.svelte';
	import Pagination from '$lib/components/Pagination.svelte';
	import Footer from '$lib/components/Footer.svelte';

	/** @type {import('./$types').PageServerData} */
	export let data;

	// Declare variables
	let screenSize = 0;
	let products = data.products.slice(0, 10);
	let orders = data.orders.slice(0, 30);
	let isProductOpen = true;
	let isOrderOpen = false;

	// Declare Functions
	const openProduct = () => {
		isProductOpen = true;
		isOrderOpen = false;
	};
	const openOrder = () => {
		isProductOpen = false;
		isOrderOpen = true;
	};
</script>

<svelte:head>
	<title>Tableau de bord | C-Studio - Plateform de vente en ligne d'oeuvre d'art</title>
</svelte:head>

<svelte:window bind:innerWidth={screenSize} />

<div class="wrapper">
	<Header />

	{#if screenSize > 1024}
		<main class="mainDashboard">
			<div class="dashboardActions">
				<nav class="dashboardMenu">
					<button
						on:click={openProduct}
						class="dashboardMenu__btn {isProductOpen ? 'dashboardMenu__btn-active' : ''}"
					>
						Produits
					</button>
					<button
						on:click={openOrder}
						class="dashboardMenu__btn {isOrderOpen ? 'dashboardMenu__btn-active' : ''}"
					>
						Commandes
					</button>
				</nav>

				<div class="dashboardActions__right">
					<div class="dashboard-filters">
						<p>Filtres :</p>
						<select name="" id="">
							<option selected disabled>Type</option>
							<option value="photogaphie">Photogaphie</option>
							<option value="peinture">Peinture</option>
						</select>
						<select name="" id="">
							<option selected disabled>Catégorie</option>
							<option value="nature">Nature</option>
							<option value="sport">Sport</option>
							<option value="musique">Musique</option>
							<option value="abstrait">Abstrait</option>
						</select>
					</div>
					<button class="dashboardActions__addProduct">Ajouter un produit</button>
				</div>
			</div>

			{#if isProductOpen} <Product {products} /> {/if}
			{#if isOrderOpen} <Order {orders} /> {/if}

			<Pagination />
		</main>
	{:else}
		<p class="main-is-disable">Veuillez utiliser un ordinateur pour cette page</p>
	{/if}
</div>

<Footer />

<style lang="scss">
	@use '../../lib/styles/variables' as *;
	.main-is-disable {
		margin-block: 4rem;
		text-align: center;
	}
	@media screen and (min-width: 1024px) {
		.mainDashboard {
			padding: 1.5rem;
			display: block;
		}
		.dashboardActions {
			display: flex;
			justify-content: space-between;
			&__right {
				display: flex;
				gap: 2rem;
			}
			&__addProduct {
				padding: 0.25rem 0.75rem;
				font-weight: 700;
				font-size: 1.1rem;
				border-radius: 0.5rem;
				background: $color-green;
				transition: 0.15s ease-in-out;
				&:hover {
					color: $color-white;
				}
			}
		}
		.dashboardMenu {
			display: flex;
			row-gap: 0.5rem;
			flex-wrap: wrap;
			&__btn {
				margin-right: 0.5rem;
				padding: 0.25rem 0.75rem;
				border-radius: 0.5rem;
				border: 2px solid transparent;
				background: gainsboro;
			}
			&__btn-active {
				border: 2px solid black;
				background: #e2e2e240;
			}
		}

		.dashboard-filters {
			width: 296px;
			display: flex;
			gap: 0.5rem;
			align-items: center;
		}

		.products {
			margin-top: 1rem;
			padding: 1.5rem 1.75rem;
			display: grid;
			grid-template-columns: repeat(5, 1fr);
			gap: 0.75rem;
			border-radius: 0.5rem;
			background: gainsboro;
		}
	}
</style>
