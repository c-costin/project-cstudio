<script>
	import '$lib/styles/app.scss';

	import { page } from '$app/stores';

	const user = $page.data.user;
</script>

<aside class="dropdown-profil js-dropdown-profil hidden">
	{#if user !== undefined}
		<h4 class="dropdown-profil__title">{user.firstName} {user.lastName}</h4>
		<div class="dropdown-profil__separator" />
		<a href="/profil" class="dropdown-profil__link">Profil</a>
		<div class="dropdown-profil__separator" />
		<a href="/connexion?/logout" class="dropdown-profil__link">Déconnexion</a>
	{:else}
		<a href="/connexion" class="dropdown-profil__login">Connexion</a>
		<a href="/inscription" class="dropdown-profil__signup"> pas encore inscrit ?</a>
	{/if}
</aside>

<style lang="scss">
	@use '../styles/variables' as *;
	.dropdown-profil {
		position: absolute;
		top: 4rem;
		right: 1rem;
		padding: 0.75rem 1rem;
		width: 156px;
		display: flex;
		flex-direction: column;
		align-items: flex-start;
		gap: 0.75rem;
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
		&__login {
			padding-block: 0.25rem;
			width: 100%;
			display: flex;
			justify-content: center;
			align-items: center;
			font-weight: 700;
			font-size: 1.25rem;
			border-radius: 0.5rem;
			background: $color-green;
			transition: 0.15s ease-in-out;
			&:hover {
				color: $color-white;
			}
		}
		&__signup {
			width: 100%;
			font-size: 0.9rem;
			text-align: center;
			transition: 0.15s ease-in-out;
			&:hover {
				color: $color-green;
			}
		}
	}
</style>
