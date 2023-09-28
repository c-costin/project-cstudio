<script>
	import '$lib/styles/app.scss';
	import logo from '$lib/icons/logo.svg';
	import iconArrowUp from '$lib/icons/arrow-up-circle.svg';
</script>

<footer class="footer">
	<div class="container">
		<img class="footer__logo" src="{logo}" alt="" />
		<section class="footer__desc">
			<div class="footer__text">
				<h2 class="footer__slogan">De l'art en boite !</h2>
				<p class="footer__resume">
					C-Studio, vend de l'art en ligne, offre une plateforme permettant aux artistes de vendre leurs créations et aux acheteurs de découvrir et d'acheter des œuvres d'art.
				</p>
			</div>
		<a href="/" class="footer__up">
				<img src="{iconArrowUp}" alt="" class="footer__icon">
			</a>
		</section>
		<section class="footer__links">
			<div class="footer__infos">
				<a href="/cgv">CGV</a>
				<a href="/mentions-legales">Mentions Légales</a>
				<a href="/contact">Nous Contacter</a>
			</div>
			<nav class="footer__socials">
				<a href="/" target="_blank" rel="noopener noreferrer">Twitter</a>
				<a href="/" target="_blank" rel="noopener noreferrer">Youtube</a>
				<a href="/" target="_blank" rel="noopener noreferrer">Instagram</a>
			</nav>
		</section>
	</div>
</footer>

<style lang="scss">
	@use '../styles/variables' as *;
	.footer {
		margin-top: 3rem;
		padding: 2rem;
		background: $color-yellow;
		border-top: 3px solid $color-black;
		&__logo {
			width: 128px;
		}
		&__desc {
			margin-bottom: 1rem;
			display: flex;
			justify-content: space-between;
		}
		&__text {
			max-width: 50%;
		}
		&__slogan {
			margin-block: 0.75rem;
			font-size: 1rem;
		}
		&__up {
			margin-right: 1.5rem;
			width: 32px;
			height: 32px;
		}
		&__icon {
			width: 100%;
			height: 100%;
		}
		&__links {
			display: flex;
			justify-content: space-between;
		}
		&__infos {
			display: flex;
			flex-direction: column;
			font-size: 0.9rem;
		}
		&__socials {
			display: flex;
			flex-direction: column;
		}
	}
</style>
