<script>
	// Import modules
	import { page } from '$app/stores';

	// Import components
	import Header from '$lib/components/Header.svelte';
	import Footer from '$lib/components/Footer.svelte';
</script>

<svelte:head>
	<title>Page non trouvée | C-Studio - Plateform de vente en ligne d'oeuvre d'art</title>
</svelte:head>

<div class="wrapper">
	<Header />

	<main class="main">
		{#if $page.status === 404}
			<h1>Oops !</h1>
			<p>Page non trouvée...</p>
		{/if}
	</main>
</div>

<Footer />

<style lang="scss">
	.main {
		height: 80vh;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
	}
</style>
