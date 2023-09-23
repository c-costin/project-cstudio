<script>
	// @ts-nocheck

	// Import generals style
	import '$lib/styles/app.scss';

	// Import component
	import { browse } from '../../../../backend/src/Controller/OrderController.php';

	export let data;

	// Declare variables
	export let id;
	export let number;
	export let deliveryDate;

	// Load method
	export async function load({ params }) {
		try {
			const orderId = params.id;
			const userId = params.userId;

			// Call browse method in OrderController.php
			const data = await browse(orderId, userId);

			return {
				props: {
					data
				}
			};
		} catch (error) {
			console.error('Erreur lors du chargement des données :', error);
			throw error;
		}
	}
</script>

<section class="order-content">
	{#if data}
		<div class="order-content__row">
			<h3>Commande n°{number}</h3>
			<p>du {deliveryDate}</p>
		</div>
	{:else}
		<p>Pas encore de coups de commande ? Devenez collectionneur d'art en un clic !</p>
		<a href="/" class="order-content__link">Visiter notre galerie</a>
	{/if}
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
