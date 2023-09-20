<script>
	// @ts-nocheck

	// Import generals style
	import '$lib/styles/app.scss';

	// Import modules
	import { page } from '$app/stores';
	import { findProductsByCategory, findProductsByType } from '$lib/js/request.js';

	// Import components
	import Header from '$lib/components/Header.svelte';
	import Hero from '$lib/components/Hero.svelte';
	import Card from '$lib/components/Card.svelte';
	import Footer from '$lib/components/Footer.svelte';

	/** @type {import('./$types').LayoutServerData} */
	/** @type {import('./$types').PageData} */
	export let data;

	$: console.log($page.data.session);

	// Declare variables
	let products = data.products.slice(0, 10);
	let types = data.types;
	let categories = data.categories;

	// Declare functions
	const onFiltredByType = async (e) => (products = await findProductsByType(e));
	const onFiltredByCategory = async (e) => (products = await findProductsByCategory(e));
	const onResetListProducts = () => (products = data.products.slice(0, 10));
</script>

<svelte:head>
	<title>Accueil | C-Studio - Plateform de vente en ligne d'oeuvre d'art</title>
</svelte:head>

<div class="wrapper">
	<Header />

	<Hero />

	<main class="main">
		<div class="container">
			<ul class="filter">
				<h2 class="filter__title">C-Studio catégories</h2>
				<select on:click={onFiltredByType}>
					<option selected disabled>Type</option>
					{#each types as type (type.id)}
						<option value={type.id}>{type.name}</option>
					{/each}
				</select>
				<select on:click={onFiltredByCategory}>
					<option selected disabled>Catégorie</option>
					{#each categories as category}
						<option value={category.id}>{category.name}</option>
					{/each}
				</select>
				<button on:click={onResetListProducts}>Tous</button>
			</ul>

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
	.main {
		margin-top: 1rem;
	}
	.filter {
		margin-inline: auto;
		padding-top: 2rem;
		padding-bottom: 2rem;
		padding-inline: 2rem;
		max-width: 150%;
		height: fit-content;
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
		gap: 0.25rem;
		&__title {
			width: 100%;
			text-align: center;
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
