<script>
	// @ts-nocheck

	// Import generals style
	import '$lib/styles/app.scss';

	// Import icons
	import iconHeart from '$lib/icons/heart.svg';

	// Import module
	import { enhance } from '$app/forms';

    /** @type {import('./$types').LayoutServerData} */
    export let data;
	let likes = data.likes
</script>

<section class="favorite-content">
	{#if likes}
		{#each likes as like}
			<div class="favorite-content__row">
				<div class="favorite-content__desc">
					<!-- svelte-ignore a11y-img-redundant-alt -->
					<img
						class="favorite-content__desc-img"
						src={like.picture}
						alt="nom de l'image : {like.title}"
					/>
					<h3 class="favorite-content__desc-name">{like.title}</h3>
				</div>
				<form action="/profil?/unlike" method="post" use:enhance>
					<button>
						<img
							src={iconHeart}
							alt="Icone de favoris"
							class="iconoir-heart favorite-content__icon"
						/>
					</button>
				</form>
			</div>
		{/each}
	{:else}
		<p>Pas encore de coups de cœur ? Sélectionner vos prochaines œuvres d'art en un clic !</p>
		<a href="/" class="order-content__link">Visiter notre galerie</a>
	{/if}
</section>

<style lang="scss">
	.favorite-content {
		padding: 1rem 1.5rem;
		margin-top: 1rem;
		width: 100%;
		height: fit-content;
		display: flex;
		flex-direction: column;
		gap: 1rem;
		border-radius: 0.5rem;
		background: gainsboro;
		&__row {
			padding-inline: 1rem;
			display: flex;
			justify-content: space-between;
			align-items: center;
			gap: 1rem;
		}
		&__desc {
			display: flex;
			align-items: center;
			gap: 1rem;
		}
		&__desc-img {
			width: 4rem;
			height: auto;
			aspect-ratio: 5/4;
			border-radius: 0.25rem;
			background: lightslategrey;
		}
		&__icon {
			font-size: 1.2rem;
		}
		&__separator {
			width: 100%;
			height: 1px;
			background: darkgray;
		}
	}
</style>
