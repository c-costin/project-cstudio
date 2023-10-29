<script>
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

	let options = { loop: true };
	let plugins = [Autoplay(autoplayOptions)];
</script>

<section class="hero">
	<div class="embla" use:emblaCarouselSvelte={{ options, plugins }}>
		<div class="embla__container">
			<div class="embla__slide">
				<img style="clip-path: polygon(0 0, 100% 0, 76% 49%, 100% 100%, 100% 100%, 0 100%, 24% 49%, 0 0);" class="embla__img" src="/img/slider/sculpture.webp" alt="sculpture" />
				<div class="embla__content">
					<button class=embla__btn>Sculptures</button>
				</div>
			</div>
			<div class="embla__slide">
				<img  style="clip-path: circle(50% at 50% 50%);" class="embla__img" src="/img/slider/photo.webp" alt="photographie" />
				<div class="embla__content">
					<button class=embla__btn> Photographies</button>
				</div>
			</div>
			<div class="embla__slide">
				<img style="clip-path: polygon(50% 0%, 80% 10%, 100% 35%, 100% 70%, 80% 90%, 50% 100%, 20% 90%, 0% 70%, 0% 35%, 20% 10%);" class="embla__img" src="/img/slider/dessin.webp" alt="dessin" />
				<div class="embla__content">
					<button class=embla__btn>Dessins</button>
				</div>
			</div>
			<div class="embla__slide">
				<img class="embla__img" src="/img/slider/tableau.webp" alt="tableau" />
				<div class="embla__content">
					<button class=embla__btn> Tableaux</button>
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
		max-width: 100%;
		overflow: hidden;
		&__container {
			padding: 1rem 1rem;
			display: flex;
		}
		&__slide {
			margin-inline: 3rem;
			flex: 0 0 50%;
			display: flex;
			flex-direction: column;
			align-items: center;
			min-width: 0;
			cursor: grab;
			&:active {
				cursor: grabbing;
			}
		}
		&__img {
			position: relative;
			width: 80vmin;
			height: 40vmin;
			border: 1px black solid;
			box-shadow: 8px 8px 10px 0 rgba(0,0,0,0.5);
			filter:grayscale(100%);
			-webkit-transition: all 2s;
			&:hover {
				filter:grayscale(0);
			}
		}

		&__btn {
			position: absolute;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			margin: auto;
			width: fit-content;
			height: fit-content;
			transform: scale(0);
			padding: 0.25rem 1.75rem;
			font-weight: 700;
			font-size: 1.25rem;
			border-radius: 0.5rem;
			background: $color-white;
			transition: 0.15s ease-in-out;
			&:hover {
				color: gray;
			}
		}
		.embla__slide:hover .embla__btn {
		transform: scale(1);
}
	}

	@media screen and (max-width: 420px) {
	}
</style>




