<script>
// @ts-nocheck

	import '$lib/styles/app.scss';

	// Declare export Product variables
	export let index;
	export let id;
	export let title;
	export let price;
	export let picture;
	export let description;
	export let dimensions;
	export let releaseDate;
	export let artist;
	export let type;
	export let categories;

</script>

<section class="favorite-content">
	<div class="favorite-content__row">
		<div class="favorite-content__desc">
			<!-- svelte-ignore a11y-img-redundant-alt -->
			<img class="favorite-content__desc-img" src="{picture}" alt="image" />
			<h3 class="favorite-content__desc-name">{title}</h3>
		</div>
		<i class="iconoir-heart favorite-content__icon" />
	</div>
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
