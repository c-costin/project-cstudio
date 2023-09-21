<script>
	// @ts-nocheck

	// Import generals style
	import '$lib/styles/app.scss';

	// Import modules
	import { page } from '$app/stores';
	import { findProductsByCategoryId, findProductsByType } from '$lib/js/request.js';

	// Import components
	import Header from '$lib/components/Header.svelte';
	import Hero from '$lib/components/Hero.svelte';
	import Card from '$lib/components/Card.svelte';
	import Footer from '$lib/components/Footer.svelte';

	/** @type {import('./$types').LayoutServerData} */
	/** @type {import('./$types').PageData} */
	export let data;

	// !!! REMOVE IN PROD !!!
	$: console.log($page.data.session);

	// Declare variables
	let products = data.products.slice(0, 10);
	let types = data.types;
	let categories = data.categories;

	// Declare functions
	const onFiltredByType = async (e) => (products = await findProductsByType(e));
	const onFiltredByCategory = async (e) => {
		const id = e.target.dataset.categoryId;
		console.log(id);
		products = await findProductsByCategoryId(id)
	};
	// const onFiltredByCategory = async (e) => (products = await findProductsByCategoryId());
	const onResetProducts = () => (products = data.products.slice(0, 10));
</script>

<svelte:head>
	<title>Accueil | C-Studio - Plateform de vente en ligne d'oeuvre d'art</title>
</svelte:head>

<div class="wrapper">
	<Header />

	<Hero />

	<main class="main">
		<div class="container">
			<h1>Découvrez toutes les œuvres de C-Studio !</h1>
			<div class="filter">
				<h2 class="filter__title">Sélectionnez votre catégorie :</h2>
				<nav class="filter__links">
					<button class="filter__link" on:click={onResetProducts}>Tous,</button>
					{#each categories as category, i (category.id)}
						<button class="filter__link" data-category-id="{category.id}" on:click={onFiltredByCategory}>
							{category.name.charAt(0).toUpperCase() + category.name.slice(1)}{(categories.length - 1) === i ? " " : "," }
						</button>
					{/each}
				</nav>
			</div>

			<section class="list-products">
				{#each products as product, i}
					{#if i === 6 || i === 7}
						<Card {...product} isBig={true} />
					{:else}
						<Card {...product} />
					{/if}
				{/each}
			</section>
		</div>
	</main>
</div>

<Footer />

<style lang="scss">
	@use '../lib/styles/variables' as *;
	.main {
		margin-top: 1rem;
	}
	.filter {
		margin-block: 2rem;
		display: flex;
		flex-wrap: wrap;
		gap: 1rem;
		align-items: center;
		&__title {
			font-size: 1rem;
		}
		&__links {
			display: flex;
			flex-wrap: wrap;
			gap: 0.35rem;
			font-style: italic;
		}
		&__link {
			transition: 0.1s ease-in-out;
			&:hover {
				color: $color-green;
				text-decoration: underline;
			}
		}
	}
	.list-products {
		display: grid;
		grid-template-columns: repeat(2, 1fr);
		font-size: small;
	}
	@media screen and (min-width: 640px) {
		.list-products {
			grid-template-columns: repeat(4, 1fr);
		}
	}
	@media screen and (min-width: 900px) {
		.list-products {
			font-size: large;
		}
	}
</style>
