<script>
	import '$lib/styles/app.scss';
	import Header from '$lib/components/Header.svelte';
	import Footer from '$lib/components/Footer.svelte';
	import Profil from '$lib/components/Profil/Profil.svelte';
	import Order from '$lib/components/Profil/Order.svelte';
	import Favorite from '$lib/components/Profil/Favorite.svelte';

	/** @type {import('./$types').PageServerData} */
	export let data;

	const user = data.user;

	console.log(user);

	// Declare variables
	let isProfilOpen = true;
	let isOrderOpen = false;
	let isFavoriteOpen = false;

	// Declare Functions
	const openProfil = () => {
		isProfilOpen = true;
		isOrderOpen = false;
		isFavoriteOpen = false;
	};
	const openOrder = () => {
		isProfilOpen = false;
		isOrderOpen = true;
		isFavoriteOpen = false;
	};
	const openFavorite = () => {
		isProfilOpen = false;
		isOrderOpen = false;
		isFavoriteOpen = true;
	};
</script>

<svelte:head>
	<title>Profil | C-Studio - Plateform de vente en ligne d'oeuvre d'art</title>
</svelte:head>


<div class="wrapper">
	<Header />
	<main class="main">
		<nav class="profil-menu">
			<button
				on:click={openProfil}
				class="profil-menu__btn {isProfilOpen ? 'profil-menu__btn-active' : ''}"
			>
				Profil
			</button>
			<button
				on:click={openOrder}
				class="profil-menu__btn {isOrderOpen ? 'profil-menu__btn-active' : ''}"
			>
				Commandes
			</button>
			<button
				on:click={openFavorite}
				class="profil-menu__btn {isFavoriteOpen ? 'profil-menu__btn-active' : ''}"
			>
				Coup de coeur
			</button>
		</nav>

		{#if isProfilOpen} <Profil {...user} /> {/if}
		{#if isOrderOpen} <Order /> {/if}
		{#if isFavoriteOpen} <Favorite /> {/if}
	</main>
</div>

<Footer />

<style lang="scss">
	.profil-menu {
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
</style>
