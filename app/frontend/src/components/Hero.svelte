<script>
	import '$lib/styles/app.scss';
	import Slide from './Slide.svelte';
</script>

<section class="hero">
	<Slide />
</section>

<style lang="scss">
	@use '../lib/styles/variables' as *;
	.hero {
		padding: 1rem 0;
		width: 100%;
		background: $color-yellow;
		min-height: 28vmin;
	}
</style>
