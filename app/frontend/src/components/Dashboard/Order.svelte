<script>
	import '$lib/styles/app.scss';
</script>

<section class="order-content">
	<div class="order-content__row">
		<h3>Commande n°84212138</h3>
		<p>du 08/12/2022</p>
	</div>
	<div class="order-content__separator" />
	<div class="order-content__row">
		<h3>Commande n°34248638</h3>
		<p>du 24/06/2022</p>
	</div>
	<div class="order-content__separator" />
	<div class="order-content__row">
		<h3>Commande n°64685138</h3>
		<p>du 01/04/2022</p>
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
