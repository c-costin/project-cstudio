<script lang="ts">
	// @ts-nocheck

	// Import generals style
	import '$lib/styles/app.scss';

	// Import modules
	import emblaCarouselSvelte from 'embla-carousel-svelte';
	import Autoplay from 'embla-carousel-autoplay';

	const autoplayOptions = {
		delay: 5000,
		stopOnInteraction: false,
		stopOnMouseEnter: true,
		rootNode: (emblaRoot) => emblaRoot.parentElement
	};

	let options = { dragFree: true, containScroll: 'trimSnaps', loop: true };
	let plugins = [Autoplay(autoplayOptions)];
</script>

<section class="hero">
	<div class="embla">
		<div class="embla__viewport" use:emblaCarouselSvelte={{ options, plugins }}>
			<div class="embla__container">
				<div class="embla__slide">
					<div class="embla__img-container">
					<img class="embla__img" src="/img/slider/sculpture.webp" alt="sculpture" />
					<div class="embla__content">
						<button class=embla__btn>Sculptures</button>
					</div>
					</div>
				</div>
				<div class="embla__slide">
					<div class="embla__img-container">
					<img class="embla__img" src="/img/slider/photo.webp" alt="photographie" />
					<div class="embla__content">
						<button class=embla__btn>Photographies</button>
					</div>
					</div>
				</div>
				<div class="embla__slide">
					<div class="embla__img-container">
					<img class="embla__img" src="/img/slider/dessin.webp" alt="dessin" />
					<div class="embla__content">
						<button class=embla__btn>Dessins</button>
					</div>
					</div>
				</div>
				<div class="embla__slide">
					<div class="embla__img-container">
					<img class="embla__img" src="/img/slider/tableau.webp" alt="tableau" />
					<div class="embla__content">
						<button class=embla__btn>Tableaux</button>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<style lang="scss">
	@use '../styles/variables' as *;
	.hero {
		padding-top: 6rem;
		width: 100%;
		background: $color-yellow;
		transform: translateY(-5.2rem);
		border-bottom: 3px solid black;
	}

	.embla {
		--slide-spacing: 4rem;
		--slide-size: 90%;
		--slide-height: 17rem;
		padding: 1.6rem;
		&__viewport {
			z-index: 10;
			overflow: hidden;
		}
		&__container {
			backface-visibility: hidden;
			display: flex;
			touch-action: pan-y;
			margin-left: calc(var(--slide-spacing) * -1);
		}
		&__slide {
			flex: 0 0 var(--slide-size);
			min-width: 0;
			padding-left: var(--slide-spacing);
			position: relative;
			cursor: grab;
			&:active {
				cursor: grabbing;
			}
		}
		&__img {
			display: block;
			height: var(--slide-height);
			width: 100%;
			object-fit: cover;
			filter:grayscale(100%);
			border-radius: 4rem;
			&:hover {
				filter:grayscale(0);
			}
		}
		&__img-container {
			position: relative;
		}

		&__btn {
			position: absolute;
			top: 0;
			bottom:0;
			left: 0;
			right: 0;
			margin:auto;
			width: fit-content;
			height: fit-content;
			opacity: 0;
			padding: 0.25rem 1.75rem;
			font-weight: 700;
			font-size: 1rem;
			border-radius: 0.5rem;
			background: $color-white;
			transition: 0.3s ease-in-out;
			&:hover {
				color: gray;
			}
		}
		.embla__slide:hover .embla__btn {
			opacity: 1;
		}
	}

	@media screen and (min-width: 994px) {
		.embla {
			--slide-spacing: 6rem;
			--slide-size: 60%;
			--slide-height: 28rem;
		}
	}
</style>




