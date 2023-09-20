<script>
	import '$lib/styles/app.scss';
	import Header from '$lib/components/Header.svelte';
	import Footer from '$lib/components/Footer.svelte';

	/** @type {import('./$types').ActionData} */
	export let form;
</script>

<svelte:head>
	<title>Connexion | C-Studio - Plateform de vente en ligne d'oeuvre d'art</title>
</svelte:head>

<div class="wrapper">
	<Header />

	<main class="main">
		<form method="POST" action="?/login" class="login">
			<h1 class="login__title">Connexion</h1>
			<div class="login__row">
				<input
					type="email"
					name="email"
					id="email"
					placeholder="Adresse mail"
					class="login__input"
					required
				/>
			</div>
			<div class="login__row">
				<input
					type="password"
					name="password"
					id="password"
					placeholder="Mot de passe"
					class="login__input"
					required
				/>
			</div>

			{#if form?.invalid}
				<p class="login__error">L'e-mail et mot de passe sont requis</p>
			{/if}

			{#if form?.credentials}
				<p class="login__error">Vous avez saisi des informations d'identification incorrectes</p>
			{/if}

			<div class="login__remember">
				<input type="checkbox" id="rememberMe" name="rememberMe" class="login__checkbox" />
				<label for="rememberMe">se souvenir de moi</label>
			</div>

			<button type="submit" class="login__submit">connexion</button>

			<div class="login__validate">
				<a href="/inscription" class="login__signup">pas encore de compte ?</a>
				<a href="/" class="login__help">problème de connexion?</a>
			</div>
		</form>
	</main>
</div>

<Footer />

<style lang="scss">
	@use '../../lib/styles/variables' as *;
	.login {
		margin-top: 6rem;
		margin-inline: auto;
		padding: 1rem 1.25rem;
		width: 100%;
		max-width: 512px;
		display: flex;
		flex-direction: column;
		gap: 1rem;
		align-items: center;
		&__row {
			display: flex;
			flex-direction: column;
			gap: 0.25rem;
			width: 100%;
		}
		&__input {
			padding: 0.25rem 0.5rem;
			border-radius: 0.25rem;
			border: 1px solid black;
		}
		&__remember {
			margin-block: 0.25rem;
			margin-left: 1rem;
			display: flex;
			gap: 0.25rem;
			justify-content: center;
			align-items: center;
			align-self: flex-start;
		}
		&__checkbox {
			transform: translateY(1px);
		}
		&__title {
			margin-top: 1rem;
			margin-bottom: 1rem;
			text-align: center;
		}
		&__submit {
			padding: 0.5rem 1.5rem;
			font-weight: 700;
			font-size: 1.25rem;
			border-radius: 0.5rem;
			background: $color-green;
			transition: 0.1s ease-in-out;
			&:hover {
				color: $color-white;
			}
		}
		&__validate {
			margin-top: 0.75rem;
			width: 100%;
			display: flex;
			gap: 0.5rem;
			align-items: center;
			justify-content: flex-end;
		}
		&__signup, &__help {
			&:hover {
				text-decoration: underline;
			}
		}
		&__error {
			padding: 0.25rem 0.75rem;
			display: flex;
			justify-content: center;
			align-items: center;
			border-radius: 0.5rem;
			font-weight: 700;
			color: $color-white;
			background: lightcoral;
		}
	}
</style>
