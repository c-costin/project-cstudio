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
	.aside-search {
        margin-bottom: 1.5rem;
		width: 100vw;
		height: 4rem;
	}

	.search {
		padding-left: 0.75rem;
		width: 100%;
		height: 3rem;
		display: flex;
		align-items: center;
		gap: 0.75rem;
		border-bottom: 2px solid black;
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
