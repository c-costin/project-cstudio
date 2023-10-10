<script lang="ts">
	// @ts-nocheck

	// Import generals style
	import '$lib/styles/app.scss';

	// Declare export variable
	export let data: LayoutServerData;

	let orders = data.orders.slice(0, 15);
</script>

<section class="order-content">
	{#each orders as order, i (order.id)}
		<div class="order-content__row">
			<h3>Commande n°{order.number}</h3>
			<p>du {order.deliveryDate}</p>
		</div>
		{#if orders.length - 1 !== i}
			<div class="order-content__separator" />
		{/if}
	{/each}
</section>

<style lang="scss">
	.order-content {
		padding: 1rem 1.5rem;
		margin-top: 1rem;
		width: 100%;
		height: fit-content;
		display: flex;
		flex-direction: column;
		gap: 1rem;
		border-radius: 0.5rem;
		background: gainsboro;
		&__separator {
			width: 100%;
			height: 1px;
			background: darkgray;
		}
	}
</style>
