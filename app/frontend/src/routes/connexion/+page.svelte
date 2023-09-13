<script>
	import '$lib/styles/app.scss';
	import Header from '../../components/Header.svelte';
	import Footer from '../../components/Footer.svelte';
	// import { token, user } from '$lib/stores.js';

	/** @type {import('./$types').PageData} */
	export let data;

	// let email = data.user.email;
  	// let password = data.user.password;
  	// let error = '';

	// Declare functions
// 	async function onAuthenticate {
// 		const credentials = { email, password };

// 		try {
// 			const response = await fetch('http://localhost:8000/api/login_check', {
// 			method: 'POST',
// 			headers: {
// 				Accept: '*/*',
// 				'Content-Type': 'application/json'
// 			},
// 			body: JSON.stringify(credentials)
// 		});
		
// 		if (response.ok) {
// 		const data = await response.json();
//         const token = data.token;

//         localStorage.setItem('token', token);

//         window.location.href = '/';
//       } else {
//         error = 'Identifiants incorrects. Veuillez réessayer.';
//       }
//     } catch (e) {
//       console.error('Erreur de connexion :', e);
//     }
//   }

	// Checking
	// $: {
	// 	console.log($token);
	// 	console.log($user);
	// }
</script>

<svelte:head>
	<title>C-Studio - Se connecter</title>
</svelte:head>

<div class="wrapper">
	<Header />
	<main class="main">
		<form method="POST" action="?/login" class="connexion-data">
			<h1 class="connexion-data__title">Connexion</h1>
			<div class="connexion-data__row">
				<input
					type="text"
					name="email"
					id="email"
					placeholder="Email"
					class="connexion-data__input"
					required
				/>
			</div>
			<div class="connexion-data__row">
				<input
					type="text"
					name="password"
					id="password"
					placeholder="Mot de passe"
					class="connexion-data__input"
					required
				/>
			</div>
			<div class="connexion-data__checkbox">
				<input type="checkbox" id="rememberMe" name="rememberMe" />
				<label for="rememberMe">se souvenir de moi</label>
			</div>
			<div class="connexion-data__validate">
				<a href="./signup.html" class="connexion-data__subscribe">s'inscrire</a>
				<button type="submit" class="connexion-data__submit">Connexion</button>
			</div>

			<a href="/" class="connexion-data__help">problème de connexion?</a>
		</form>
	</main>
</div>

<Footer />

<style lang="scss">
	.connexion-data {
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
		&__checkbox {
			margin-left: 1rem;
			align-self: flex-start;
		}
		&__title {
			margin-top: 1rem;
			margin-bottom: 1rem;
			text-align: center;
		}
		&__validate {
			display: flex;
			align-items: center;
			width: 100%;
			justify-content: flex-end;
			margin-block: 3rem;
		}
		&__submit {
			border: 2px solid transparent;
			border-radius: 8px;
			padding: 0.5rem;
			margin-left: 2rem;
		}
		&__submit:hover {
			border: 2px solid black;
			box-shadow: 0px 5px 5px black;
		}
	}
</style>
