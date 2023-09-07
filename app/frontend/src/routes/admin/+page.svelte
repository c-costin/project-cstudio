<script>
	import Header from '../../components/Header.svelte';
	import Pagination from '../../components/Pagination.svelte';
	import Footer from '../../components/Footer.svelte';
	import Product from '../../components/Dashboard/Product.svelte';
	import Order from '../../components/Dashboard/Order.svelte';

	// Declare variables
	let data = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19];
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

<div class="wrapper">
	<Header />

	{#if true}
		<main class="main-dashboard">
			<div class="dashboard-actions">
				<nav class="dashboard-menu">
					<button 
						on:click={openProduct}
						class="dashboard-menu__btn {isProductOpen ? 'dashboard-menu__btn-active' : ''}">Produits</button>
					<button 
						on:click={openOrder}
						class="dashboard-menu__btn {isOrderOpen ? 'dashboard-menu__btn-active' : ''}">Commandes</button>
				</nav>

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
			</div>

			{#if isProductOpen} <Product products={data} /> {/if}
			{#if isOrderOpen} <Order orders={data} /> {/if}

			<Pagination />
		</main>
	{:else}
		<p class="main-is-disable">Veuillez utiliser un ordinateur pour cette page</p>
	{/if}
</div>

<Footer />

<style lang="scss">
	.main-dashboard {
		display: none;
	}
	.main-is-disable {
		margin-block: 4rem;
		text-align: center;
	}
	@media screen and (min-width: 1024px) {
		.main-is-disable {
			display: none;
		}

		.main-dashboard {
			display: block;
		}

		.dashboard-actions {
			display: flex;
			justify-content: space-between;
		}

		.dashboard-menu {
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
