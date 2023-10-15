<script>
	import '$lib/styles/app.scss';
	import { createEventDispatcher } from 'svelte';
	import iconCloseMenu from '$lib/icons/cancel.svg';

	const dispatch = createEventDispatcher();
	const closeMenu = () => dispatch('closeMenu');
</script>

<nav class="menu">
	<button on:click={closeMenu}>
		<img src="{iconCloseMenu}" alt="Icon pour fermeture menu" class="menu__icon">
	</button>
	<div class="menu__links">
		<a href="/" class="menu__link">Accueil</a>
		<a href="/a-propos" class="menu__link">À Propos</a>
	</div>
	<div class="menu__refs">
		<a href="/cgv" class="menu__ref">CGV</a>
		<a href="/mentions-legales" class="menu__ref">Mentions Légales</a>
		<a href="/contact" class="menu__ref">Contact</a>
	</div>
</nav>

<style lang="scss">
	.menu {
		z-index: 1;
		position: absolute;
		top: 0;
		left: 0;
		padding: 1.5rem;
		width: 100%;
		height: 100%;
		display: flex;
		flex-direction: column;
		gap: 1.75rem;
		background: white;
		&__icon {
			font-size: 1.8rem;
		}
		&__links {
			margin-top: 1rem;
			display: flex;
			flex-direction: column;
			gap: 0.75rem;
		}
		&__refs {
			display: flex;
			flex-direction: column;
			gap: 0.25rem;
		}
		&__link {
			font-size: 2rem;
			&:hover {
				color: gray;
			}
		}
		&__ref {
			&:hover {
				color: gray;
			}
		}
	}

	@media screen and (min-width: 992px) {
		.menu {
			position: relative;
			padding: 0;
			width: fit-content;
			display: flex;
			flex-direction: row;
			gap: 0;
			background: none;
			&__links {
				margin-top: 0;
				flex-direction: row;
				align-items: center;
				gap: 1.75rem;
			}
			&__link {
				font-size: 1.4rem;
				&:hover {
					color: gray;
				}
			}
			&__icon {
				display: none;
			}
			&__ref {
				display: none;
			}
		}
	}
</style>