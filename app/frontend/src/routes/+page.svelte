<script>
	import '$lib/styles/app.scss';
	import Header from '$lib/components/Header.svelte';
	import Footer from '$lib/components/Footer.svelte';
	import Card from '$lib/components/Card.svelte';
	import Hero from '$lib/components/Hero.svelte';
	import { findProductsByCategory, findProductsByType } from '$lib/js/request.js';

	/** @type {import('./$types').PageData} */
	/** @type {import('./$types').LayoutServerData} */
	export let data;

	let products = data.products.slice(0, 10);
	let types = data.types;
	let categories = data.categories;

	const onFiltredByType = async (e) => {
		products = await findProductsByType(e);
	}

	const onFiltredByCategory = async (e) => {
		products = await findProductsByCategory(e);
	}

	const onResetListProducts = () => {
		products = data.products.slice(0, 10);
	}
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
		margin-top: 14rem;
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
		&__item {
			list-style-type: none;
		}
		&__btn {
			border-radius: 1.5rem;
			box-sizing: border-box;
			display: inline-block;
			font-size: 1rem;
			font-weight: 600;
			line-height: 1;
			padding: 0.5rem 0.6rem;
			text-align: center;
			&:hover {
				background-color: #1e293b;
				color: #fff;
			}
		}
	}
	.list-products {
		display: grid;
		grid-template-columns: repeat(2, 1fr);
		gap: 1rem;
	}
	@media screen and (min-width: 640px) {
		.list-products {
			grid-template-columns: repeat(4, 1fr);
		}
	}
</style>
