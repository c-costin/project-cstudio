<script>
	import '$lib/styles/app.scss';
	import iconArrowUp from '$lib/icons/arrow-up-circle.svg';
</script>

<footer class="footer">
	<div class="container">
		<p class="footer__logo">C-Studio</p>
		<section class="footer__desc">
			<div class="footer__text">
				<h2 class="footer__slogan">Slogan de ouf !</h2>
				<p class="footer__resume">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
			</div>
			<a href="/">
				<img src="{iconArrowUp}" alt="" class="footer__icon">
			</a>
		</section>
		<section class="footer__links">
			<div class="footer__infos">
				<a href="/">CGV</a>
				<a href="/">Mentions Légales</a>
				<a href="/">Nous Contacter</a>
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
	@use '../lib/styles/variables' as *;
	.footer {
		margin-top: 3rem;
		padding: 2rem;
		display: flex;
		// flex-direction: column;
		gap: 1.5rem;
		background: $color-yellow;
		border-top: 3px solid $color-black;
		&__logo {
			font-size: 1.2rem;
			font-style: italic;
		}
		&__desc {
			display: flex;
			justify-content: space-between;
		}
		&__text {
			max-width: 50%;
		}
		&__slogan {
			font-size: 1rem;
		}
		&__icon {
			margin: 0.5rem;
			font-size: 3rem;
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

	@media screen and (min-width: 1280px) {
		.footer {
			padding-inline: 4rem;
			border-radius: 0.5rem 0.5rem 0rem 0rem;
		}
	}
</style>
