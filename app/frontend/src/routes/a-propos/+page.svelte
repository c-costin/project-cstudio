<script>
	import '$lib/styles/app.scss';
	import Header from '$lib/components/Header.svelte';
	import Footer from '$lib/components/Footer.svelte';
</script>

<svelte:head>
	<title>À Propos | C-Studio - Plateform de vente en ligne d'oeuvre d'art</title>
</svelte:head>

<div class="wrapper">
	<Header />
	<main class="main">
		<section class="about">
			<!-- svelte-ignore a11y-img-redundant-alt -->
			<img class="about__img" src="#" alt="Image" />
			<div class="about__info">
				<h1 class="about__title">A propos</h1>
				<p class="about__description">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe ab ex dignissimos facilis
					commodi, placeat tempora ipsa autem voluptatem blanditiis inventore iusto quos suscipit
					repellat ea est quo dicta dolore. Lorem ipsum dolor sit amet consectetur adipisicing elit.
					Quas aspernatur sunt, dolor temporibus facere voluptatum beatae aut, sit magni aliquam!
				</p>
			</div>

			<div class="about__service">
				<h1 class="about__title">Service client</h1>
				<h2 class="about__subtitle">Expédition</h2>
				<p class="about__description">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
				<h2 class="about__subtitle">Retour</h2>
				<p class="about__description">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
				<h2 class="about__subtitle">Contactez-nous</h2>
				<p class="about__description">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
			</div>
		</section>
	</main>
</div>

<Footer />

<style lang="scss">
	.about {
		display: flex;
		flex-direction: column;
		flex-wrap: wrap;
		align-items: center;
		margin-top: 5rem;
		max-width: 892px;
		margin-inline: auto;

		&__img {
			width: 100%;
			max-width: 396px;
			height: auto;
			aspect-ratio: 5/3;
			border-radius: 0.25rem;
			background: lightslategrey;
			margin-bottom: 1rem;
		}

		&__info {
			max-width: 396px;
		}

		&__title {
			padding-top: 2rem;
			padding-bottom: 1rem;
			font-size: 1.8rem;
		}

		&__subtitle {
			font-size: 1.2rem;
		}

		&__description {
			font-size: 1rem;
			padding-bottom: 0.5rem;
		}
	}

	@media screen and (min-width: 768px) {
		.about {
			width: 80%;
			margin-top: 3rem;
		}
	}

	@media screen and (min-width: 992px) {
		.about {
			flex-direction: row;
			gap: 2rem;
			&__img {
				margin: 0;
			}
		}
	}
</style>
