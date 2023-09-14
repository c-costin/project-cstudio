<script>
	import '$lib/styles/app.scss';
</script>

<aside class="dropdown-profil js-dropdown-profil hidden">
	<h4 class="dropdown-profil__title">John Doe</h4>
	<div class="dropdown-profil__separator" />
	<button class="dropdown-profil__link">Profil</button>
	<button class="dropdown-profil__link">Commandes</button>
	<button class="dropdown-profil__link">Coup de cœurs</button>
	<div class="dropdown-profil__separator" />
	<button class="dropdown-profil__link">Déconnexion</button>
</aside>

<style lang="scss">
	.dropdown-profil {
		position: absolute;
		top: 4.5rem;
		right: 1rem;
		padding: 0.75rem 1rem;
		width: 156px;
		display: flex;
		flex-direction: column;
		align-items: flex-start;
		gap: 0.5rem;
		border-radius: 0.5rem;
		border: 1px solid rgba(255, 255, 255, 0.15);
		backdrop-filter: blur(3.1px);
		-webkit-backdrop-filter: blur(3.1px);
		box-shadow: 0 4px 30px rgba(0, 0, 0, 0.15);
		background: rgba(255, 255, 255, 0.9);
		&__separator {
			width: 100%;
			height: 1px;
			background: black;
		}
		&__link {
			background: none;
			&:hover {
				color: lightslategray;
			}
		}
	}
</style>
