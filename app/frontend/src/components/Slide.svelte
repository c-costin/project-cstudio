<script>
	import sliderSculptureImage from '$lib/sliderpictures/sculpture.jpg';
	import sliderDessinImage from '$lib/sliderpictures/dessin.webp';
	import sliderPhotoImage from '$lib/sliderpictures/photo.jpg';
	import sliderTableauImage from '$lib/sliderpictures/tableau.jpg';

	let holding = false;
	let firstClickX;
	let alreadyLeftScrolled;

	const onMouseDown = (e) => {
		holding = true;
		firstClickX = e.pageX - e.currentTarget.offsetLeft;
		alreadyLeftScrolled = e.currentTarget.scrollLeft;
	};

	const onMouseMove = (e) => {
		if (!holding) return;
		const x = e.pageX - e.currentTarget.offsetLeft;
		const scrolled = (x - firstClickX) * 3;
		e.currentTarget.scrollLeft = alreadyLeftScrolled - scrolled;
	};

	const onMouseUp = (e) => {
		holding = false;
	};

	const onMouseLeave = (e) => {
		holding = false;
	};

	const ontouchstart = (e) => {
		holding = true;
		firstClickX = e.targetTouches[0].pageX - e.currentTarget.offsetLeft;
		alreadyLeftScrolled = e.currentTarget.scrollLeft;
	};

	const ontouchend = () => {
		holding = false;
	};

	const ontouchmove = (e) => {
		if (!holding) return;

		const x = e.targetTouches[0].pageX - e.currentTarget.offsetLeft;
		const scrolled = (x - firstClickX) * 3;
		e.currentTarget.scrollLeft = alreadyLeftScrolled - scrolled;
	};
</script>

<div
	class="slideshow-container"
	on:mousedown={onMouseDown}
	on:mouseleave={onMouseLeave}
	on:mouseup={onMouseUp}
	on:mousemove={onMouseMove}
	on:touchstart={ontouchstart}
	on:touchend={ontouchend}
	on:touchmove={ontouchmove}
>
	<div class="slideshow">
		<div class="slide">
			<img class="slide__image" src={sliderSculptureImage} alt="sculpture" />
			<div class="overlay">
				<h1>Explorer</h1>
			</div>
			<h2>Sculpture</h2>
			<a href="/">Explorer</a>
		</div>

		<div class="slide">
			<img class="slide__image" src={sliderDessinImage} alt="dessin" />
			<div class="overlay">
				<h1>Explorer</h1>
			</div>
			<h2>Dessins</h2>
			<a href="/">Explorer</a>
		</div>

		<div class="slide">
			<img class="slide__image" src={sliderPhotoImage} alt="photographie" />
			<div class="overlay">
				<h1>Explorer</h1>
			</div>
			<h2>Photographie</h2>
			<a href="/">Explorer</a>
		</div>

		<div class="slide">
			<img class="slide__image" src={sliderTableauImage} alt="tableau" />
			<div class="overlay">
				<h1>Explorer</h1>
			</div>
			<h2>Tableau</h2>
			<a href="/">Explorer</a>
		</div>
	</div>
</div>

<style lang="scss">
	.slideshow-container {
		overflow: hidden;
		min-height: 26vmin;
		cursor: grab;
		position: relative;
		background-color: black;
		scroll-snap-type: x mandatory;
	}

	.slideshow-container:active {
		cursor: grabbing;
	}

	.slideshow {
		position: absolute;
		height: 100%;
		display: flex;
		pointer-events: none;
	}

	.slide {
		flex-shrink: 0;
		height: 100%;
		width: 80vmin;
		color: #fff;
		background-size: cover;
		background-position: center;
		position: relative;
		scroll-snap-align: center;
    &__image {
      height: 100%;
		  width: 80vmin;
    }
	}

	.slide:not(:nth-child(1)) {
		margin-left: 10px;
	}

	.overlay {
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		background: rgba(0, 0, 0, 0.15);
		transform: scale(0);
		transition: 0.3s ease-in-out;
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.slide:hover .overlay {
		transform: scale(1);
	}

	.slide h2,
	.slide a {
		text-shadow: 1px 1px 5px black;
	}

	.slide h2 {
		position: absolute;
		top: clamp(10px, 2vw, 20px);
		left: clamp(10px, 2vw, 20px);
		font-size: clamp(20px, 3vw, 40px);
		font-weight: 300;
	}

	.slide a {
		position: absolute;
		bottom: clamp(10px, 2vw, 20px);
		right: clamp(10px, 2vw, 20px);
		font-size: clamp(16px, 3vw, 25px);
		font-weight: 300;
		color: #fff;
		pointer-events: auto;
	}
</style>
