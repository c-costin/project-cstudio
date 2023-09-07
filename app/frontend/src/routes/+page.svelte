<script>
	import '$lib/styles/app.scss';
	import Header from '../components/Header.svelte';
	import Footer from '../components/Footer.svelte';
	import Card from '../components/Card.svelte';
	import Hero from '../components/Hero.svelte';
	import { token, user } from '$lib/stores.js';

	let products = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

	$: {
		console.log($token);
		console.log($user);
	}
</script>

<svelte:head>
	<title>C-Studio - Accueil</title>
</svelte:head>

<div class="wrapper">
	<Header />

	<Hero />

	<main class="main">
		<ul class="filter">
			<h2 class="filter__title">C-Studio catégories</h2>
			<li class="filter__item"><button class="filter__btn">catégorie 1</button></li>
			<li class="filter__item"><button class="filter__btn">catégorie 2</button></li>
			<li class="filter__item"><button class="filter__btn">catégorie 3</button></li>
			<li class="filter__item"><button class="filter__btn">catégorie 4</button></li>
			<li class="filter__item"><button class="filter__btn">catégorie 5</button></li>
			<li class="filter__item"><button class="filter__btn">catégorie 6</button></li>
		</ul>

		<section class="list-products">
			{#each products as product, i}
				{#if i === 6 || i === 7}
					<Card isBig={true} />
				{:else}
					<Card />
				{/if}
			{/each}
		</section>
	</main>
</div>

<Footer />

<style lang="scss">
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
