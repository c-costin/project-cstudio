<script>
	import '$lib/styles/app.scss';
	import Header from '$lib/components/Header.svelte';
	import Footer from '$lib/components/Footer.svelte';

	/** @type {import('./$types').PageData} */
	export let data;
	export let form;
</script>

<svelte:head>
	<title>Inscription | C-Studio - Plateform de vente en ligne d'oeuvre d'art</title>
</svelte:head>

<div class="wrapper">
	<Header />
	<main>
		{#if form?.error}
			<p class="error">{form.error.message}</p>
		{/if}
		<form action="?/create" method="POST" class="inscription-data">
			<h1 class="inscription-data__title">Inscription</h1>
			<div class="inscription-data__row">
				<input
					type="text"
					name="lastName"
					id="lastName"
					placeholder="Nom"
					class="inscription-data__input"
				/>
			</div>
			<div class="inscription-data__row">
				<input
					type="text"
					name="firstName"
					id="firstName"
					placeholder="Prénom"
					class="inscription-data__input"
					required
				/>
			</div>
			<div class="inscription-data__row">
				<input
					type="email"
					name="email"
					id="email"
					placeholder="Email"
					class="inscription-data__input"
					required
				/>
			</div>
			<div class="inscription-data__row">
				<input
					type="text"
					name="phone"
					id="phone"
					placeholder="Téléphone"
					class="inscription-data__input"
				/>
			</div>
			<div class="inscription-data__row">
				<input
					type="password"
					name="password"
					id="paswword"
					placeholder="Mot de passe"
					class="inscription-data__input"
					required
				/>
			</div>
			<div class="inscription-data__row">
				<input
					type="password"
					name="confirmPassword"
					id="confirmPassword"
					placeholder="Confirmez le mot de passe"
					class="inscription-data__input"
					required
				/>
			</div>
			<div class="inscription-data__checkbox">
				<input type="checkbox" />
				<label for="conditionsApproval">J'accepte les conditions</label>
			</div>
			<div class="inscription-data__row">
				<input type="submit" value="inscription" />
			</div>
			<a href="/connexion" class="inscription-data__existAlready">
				J'ai déjà un compte? je me connecte
			</a>
		</form>
	</main>
</div>

<Footer />

<style lang="scss">
	.inscription-data {
		padding: 1rem 1.25rem;
		width: 100%;
		display: flex;
		flex-direction: column;
		gap: 1rem;
		&__row {
			display: flex;
			flex-direction: column;
			gap: 0.25rem;
		}
		&__input {
			padding: 0.25rem 0.5rem;
			border-radius: 0.25rem;
			border: 1px solid black;
		}
		&__existAlready {
			text-align: center;
		}
		&__checkbox {
			text-align: center;
		}
		&__title {
			margin-top: 1rem;
			margin-bottom: 1rem;
			text-align: center;
		}
	}

	@media screen and (min-width: 992px) {
		.inscription-data {
			align-items: center;
			&__row {
				width: 75%;
			}
		}
	}

	@media screen and (min-width: 1280px) {
		.inscription-data {
			align-items: center;
			&__row {
				width: 50%;
			}
		}
	}
</style>
