<script>
	import '$lib/styles/app.scss';
	import Header from '$lib/components/Header.svelte';
	import Footer from '$lib/components/Footer.svelte';
</script>

<svelte:head>
	<title>Mentions Légales | C-Studio - Plateform de vente en ligne d'oeuvre d'art</title>
</svelte:head>

<div class="wrapper">
	<Header />
	<main class="main">
		<section class="mentions-legales">
			<h1 class="mentions-legales__title">Mentions légales</h1>

			<p class="mentions-legales__subtitle">En vigueur au 01/10/2023</p>

			<p class="mentions-legales__summary">
				Conformément aux dispositions des Articles 6-III et 19 de la Loi n°2004-575 du 21 juin 2004
				pour la Confiance dans l’économie numérique, dite L.C.E.N, il est porté à la connaissance
				des utilisateurs et visiteurs, ci-après l'Utilisateur", du site c-studio.fr ,
				ci-après le "Site", les présentes mentions légales. La connexion et la navigation sur le
				Site par l’Utilisateur implique acceptation intégrale et sans réserve des présentes mentions
				légales. Ces dernières sont accessibles sur le Site à la rubrique « Mentions légales».
			</p>
		</section>

		<section class="article">
			<h3 class="article__title">ARTICLE 1 - L'EDITEUR</h3>
			<p class="article__content">
				L’édition et la direction de la publication du Site est assurée par L'équipe de C-studio ci-après l'"Editeur".
			</p>

			<h3 class="article__title">ARTICLE 2 - L'HEBERGEUR</h3>
			<p class="article__content">
				L'hébergeur du Site est la société C-studio, dont le siège social est situé à Le Mans.
			</p>

			<h3 class="article__title">ARTICLE 3 - ACCES AU SITE</h3>
			<p class="article__content">
				Le Site est accessible en tout endroit, 7j/7, 24h/24 sauf cas de force majeure, interruption
				programmée ou non et pouvant découlant d’une nécessité de maintenance. En cas de
				modification, interruption ou suspension du Site, l'Editeur ne saurait être tenu
				responsable.
			</p>

			<h3 class="article__title">ARTICLE 4 - COLLECTE DES DONNEES</h3>
			<p class="article__content">
				Le site effectue des déclaration à la Commission Nationale Informatique et Libertés (CNIL)
				dans la mesure où il collecte des données concernant les utilisateurs. Toute utilisation,
				reproduction, diffusion, commercialisation, modification de toute ou partie du Site, sans
				autorisation de l’Editeur est prohibée et pourra entraînée des actions et poursuites
				judiciaires telles que notamment prévues par le Code de la propriété intellectuelle et le
				Code civil.
			</p>
		</section>
	</main>
</div>

<Footer />

<style lang="scss">
	.mentions-legales {
		margin: auto;
		margin-bottom: 2rem;
		text-align: center;
		&__title {
			margin-bottom: 0.5rem;
		}
		&__subtitle {
			margin-block: 2rem;
		}
		&__summary {
			text-align: justify;
		}
	}

	.article {
		margin: auto;
		margin-bottom: 2rem;
		&__title {
			margin-bottom: 0.5rem;
		}
		&__content {
			margin-bottom: 1rem;
			text-align: justify;
		}
	}

	@media screen and (min-width: 768px) {
		.mentions-legales {
			width: 75%;
		}
		.article {
			width: 75%;
		}
	}
</style>
