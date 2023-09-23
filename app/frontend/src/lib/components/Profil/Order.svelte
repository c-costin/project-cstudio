<script>
	// @ts-nocheck

	import '$lib/styles/app.scss';

	import LikeService from 'app/backend/src/Service/LikeService.php';

	export async function load({ params }) {
		try {
			const productId = params.id;
			const userId = params.userId;

			// Init LikeService
			const likeService = new LikeService();

			// Call find method
			const data = await likeService.find(productId, userId);

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
	export let data;

	export let id;
	export let number;
	export let deliveryDate;
</script>

<section class="order-content">
	{#if data}
	<div class="order-content__row">
		<h3>Commande n°{data.number}</h3>
		<p>du {data.deliveryDate}</p>
	</div>
	{:else}
    <p>Pas encore de coups de cœur ? Devenez collectionneur en un clic !</p>
	<a href="/" class="order-content__link">Visiter la galerie</a>
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
