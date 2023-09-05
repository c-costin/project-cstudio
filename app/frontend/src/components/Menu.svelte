<script>
	import '$lib/styles/app.scss';
	import { createEventDispatcher } from 'svelte';

	const dispatch = createEventDispatcher();
	const toggleMenu = () => dispatch('toggleMenuChild');
</script>

<nav class="menu">
	<i class="iconoir-cancel menu__icon" on:click={toggleMenu} />
	<div class="menu__links">
		<a href="../index.html" class="menu__link">Accueil</a>
		<a href="./about.html" class="menu__link">A Propos</a>
	</div>
	<div class="menu__refs">
		<a href="" class="menu__ref">Mentions Légales</a>
		<a href="" class="menu__ref">CGV</a>
		<a href="" class="menu__ref">Contact</a>
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

	@media screen and (min-width: 1024px) {
		.menu {
			position: relative;
			padding: 0;
			width: fit-content;
			display: flex !important;
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
				font-size: 1.2rem;
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
