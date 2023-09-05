<script>
    import '$lib/styles/app.scss';
	import Search from '../components/Search.svelte';
	import Header from '../components/Header.svelte';
    import Footer from "../components/Footer.svelte";
</script>

<svelte:head>
    <title>Accueil</title>
</svelte:head>

<div class="wrapper">
    <Search />
    <Header />
</div>
<Footer />

