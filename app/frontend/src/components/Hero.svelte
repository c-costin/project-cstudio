<script>
	import '$lib/styles/app.scss';
</script>

<section class="hero">
	<a href="/" class="hero__link">
		<!-- svelte-ignore a11y-img-redundant-alt -->
		<img src="/" alt="Image" class="hero__img" />
	</a>
</section>

<style lang="scss">
	.hero {
		padding: 1.5rem 2.5rem;
		width: 100%;
		height: fit-content;
		border-bottom: 1px solid black;
		&__img {
			margin-inline: auto;
			width: 100%;
			max-width: 512px;
			aspect-ratio: 5/3;
			border-radius: 0.5rem;
			background: lightslategray;
		}
	}
</style>
