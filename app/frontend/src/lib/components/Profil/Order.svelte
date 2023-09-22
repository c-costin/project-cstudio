<script>
// @ts-nocheck

	import '$lib/styles/app.scss';

	export let id;
	export let number;
	export let deliveryDate;
</script>

<section class="order-content">
	<div class="order-content__row">
		<h3>Commande n°{number}</h3>
		<p>du {deliveryDate}</p>
	</div>
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
