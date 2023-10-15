<script lang="ts">
	// @ts-nocheck

	export let data: LayoutServerData;

	let productNumbers: number = 0;
	let typeNumbers = data.types.lenght;
	let cetegoryNumbers = data.categories.lenght;
	let orderNumbers = data.orders.lenght;

	$: data.products.forEach(product => productNumbers++)
</script>

<h1>Home</h1>
<p>Nombre de produits : {productNumbers}</p>
