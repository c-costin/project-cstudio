<script>
	import '$lib/styles/app.scss';
</script>

<section class="hero">
</section>

<style lang="scss">
	@use '../styles/variables' as *;
	.hero {
		z-index: -1;
		position: absolute;
		top: 0;
		left: 0;
		padding-top: 6rem;
		width: 100%;
		height: 296px;
		border-bottom: 3px solid $color-black;
		background: $color-yellow;
	}
</style>
