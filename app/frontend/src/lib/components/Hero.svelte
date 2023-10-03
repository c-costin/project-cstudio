<script>
	import '$lib/styles/app.scss';
	import Slider from './Slider.svelte';
</script>

<section class="hero">
	<Slider />
</section>

<style lang="scss">
	@use '../styles/variables' as *;
	.hero {
		padding: 1rem 0;
		width: 100%;
		background: $color-yellow;
		min-height: 28vmin;
	}
</style>
