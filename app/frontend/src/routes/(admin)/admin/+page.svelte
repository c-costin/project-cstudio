<script>
	// @ts-nocheck

	/** @type {import('./$types').LayoutServerData} */
	export let data;

	let productNumbers = data.products.lenght;
	let typeNumbers = data.types.lenght;
	let cetegoryNumbers = data.categories.lenght;
	let orderNumbers = data.orders.lenght;
</script>

<h1>Home</h1>
<p>Nombre de produits : {productNumbers}</p>
