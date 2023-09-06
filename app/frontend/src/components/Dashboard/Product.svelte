<script>
    import '$lib/styles/app.scss';
	import Card from '../Card.svelte';
     // @ts-ignore
     export let products;
</script>

<scetion class="products">
    {#each products as product}
        <Card />
    {/each}
</scetion>

<style lang="scss">

</style>