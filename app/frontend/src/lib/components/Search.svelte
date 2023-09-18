<script>
	import '$lib/styles/app.scss';
</script>

<aside class="aside-search">
	<form class="search">
		<i class="iconoir-search search__icon" />
		<input placeholder="Recheche..." class="search__input" />
	</form>
</aside>

<style lang="scss">
	@use '$lib/styles/variables' as *;

	.aside-search {
        // margin-bottom: 1.5rem;
		width: 100vw;
		height: 4rem;
		background: $color-background;
		border-bottom: 3px solid $color-black;
	}

	.search {
		padding-block: 2rem;
		padding-left: 0.75rem;
		width: 100%;
		height: 3rem;
		display: flex;
		align-items: center;
		gap: 0.75rem;
		&__icon {
			font-size: 1.2rem;
		}
		&__input {
			padding-right: 0.5rem;
			width: 100%;
			font-size: 1.2rem;
			&:focus {
				outline: none;
			}
		}
	}
</style>
