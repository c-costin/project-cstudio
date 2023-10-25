<script>
	// @ts-nocheck

	// Import generals style
	import '$lib/styles/app.scss';

	// Import modules
	import emblaCarouselSvelte from 'embla-carousel-svelte';
	import Autoplay from 'embla-carousel-autoplay';

	const autoplayOptions = {
		delay: 3000,
		stopOnInteraction: false,
		stopOnMouseEnter: true,
		rootNode: (emblaRoot) => emblaRoot.parentElement
	};

	let options = { loop: true };
	let plugins = [Autoplay(autoplayOptions)];
</script>

<section class="hero">
	<div class="embla" use:emblaCarouselSvelte={{ options, plugins }}>
		<div class="embla__container">
			<div class="embla__slide">
				<img class="embla__img" src="/img/slider/sculpture.jpg" alt="sculpture" />
				<div class="embla__content">
					<h3 class="embla__title">Sculptures</h3>
					<button class=embla__btn> Explorer</button>
				</div>
			</div>
			<div class="embla__slide">
				<img class="embla__img" src="/img/slider/dessin.webp" alt="dessin" />
				<div class="embla__content">
					<h3 class="embla__title">Dessins</h3>
					<button class=embla__btn> Explorer</button>
				</div>
			</div>
			<div class="embla__slide">
				<img class="embla__img" src="/img/slider/photo.jpg" alt="photographie" />
				<div class="embla__content">
					<h3 class="embla__title">Photographies</h3>
					<button class=embla__btn> Explorer</button>
				</div>
			</div>
			<div class="embla__slide">
				<img class="embla__img" src="/img/slider/tableau.jpg" alt="tableau" />
				<div class="embla__content">
					<h3 class="embla__title">Tableaux</h3>
					<button class=embla__btn> Explorer</button>
				</div>
			</div>
		</div>
		<div class="embla__dots" />
	</div>
	<!-- <Slider /> -->
</section>

<style lang="scss">
	@use '../styles/variables' as *;
	.hero {
		z-index: -1;
		padding-top: 6rem;
		width: 100%;
		background: $color-yellow;
		min-height: 28vmin;
		transform: translateY(-6rem);
		border-bottom: 3px solid black;
	}

	.embla {
		margin-inline: auto;
		max-width: 90%;
		overflow: hidden;
		&__container {
			padding: 1rem 1rem;
			display: flex;
		}
		&__slide {
			margin-inline: 3rem;
			flex: 0 0 100%;
			display: flex;
			justify-content: flex-start;
			flex-direction: column;
			align-items: center;
			min-width: 0;
			cursor: grab;
			&:active {
				cursor: grabbing;
			}
		}
		&__img {
			width: 100vmin;
			height: 30vmin;
			border: 1px black solid;
			object-fit: cover;
			box-shadow: 8px 8px 10px 0 rgba(0,0,0,0.5);
			filter:grayscale(100%);
			-webkit-transition: all 2s;
			&:hover {
				filter:grayscale(0);
				transform:scale(1.1);
			}
		}
		&__content {
			display: flex;
			flex-direction: row;
			gap: 1rem;
			align-items: end;
		}
		&__title {
			margin-top: 1rem;
			font-size: 2rem;
		}
		&__btn {
			padding: 0.25rem 1.75rem;
			font-weight: 700;
			font-size: 1.25rem;
			border-radius: 0.5rem;
			background: $color-green;
			transition: 0.15s ease-in-out;
			&:hover {
				color: $color-white;
			}
		}
	}

	@media screen and (max-width: 420px) {
		.embla {
			&__title {
			margin-top: 1rem;
			font-size: 1.4rem;
		}
		}
	}
</style>
