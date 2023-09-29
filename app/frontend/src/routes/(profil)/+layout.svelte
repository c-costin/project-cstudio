<script>
	// @ts-nocheck

	import '$lib/styles/app.scss';
	import Header from '$lib/components/Header.svelte';
	import Footer from '$lib/components/Footer.svelte';
	import { fade } from 'svelte/transition';

	/** @type {import('./$types').LayoutServerData} */
	export let data;

	const user = data.user;
	let orders = data.orders;
	let likes = data.likes;
</script>

<svelte:head>
	<title>Profil | C-Studio - Plateforme de vente en ligne d'oeuvres d'art</title>
</svelte:head>

<div class="wrapper">
	<Header />
	<main class="main">
		<nav class="profil-menu">
			<a href="/profil" class="profil-menu__btn {data.pathname === '/profil' ? 'profil-menu__btn-active' : ''}"> Profil </a>
			<a href="/profil/commandes" class="profil-menu__btn {data.pathname === '/profil/commandes' ? 'profil-menu__btn-active' : ''}"> Commandes </a>
			<a href="/profil/coups-de-coeur" class="profil-menu__btn {data.pathname === '/profil/coups-de-coeur' ? 'profil-menu__btn-active' : ''}"> Coups de cœur </a>
		</nav>

		<!-- {#key data.pathname}
			<div class="" in:fade={{ delay: 250, duration: 100 }} out:fade> -->
				<slot />
			<!-- </div>
		{/key} -->
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
