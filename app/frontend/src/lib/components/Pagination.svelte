<script>
    import '$lib/styles/app.scss';
</script>

<nav class="pagination-container" aria-label="pagination">
	<ul class="pagination">
		<li class="pagination__icon"><i class="iconoir-nav-arrow-left" /></li>
		<li class="pagination__page pagination__page-is-active">1</li>
		<li class="pagination__page">2</li>
		<li class="pagination__page">3</li>
		<li class="pagination__icon"><i class="iconoir-nav-arrow-right" /></li>
	</ul>
</nav>

<style lang="scss">
	.pagination-container {
		margin-top: 1rem;
		margin-inline: auto;
		width: fit-content;
	}

	.pagination {
		width: fit-content;
		display: flex;
		justify-content: center;
		align-items: center;
		gap: 0.75rem;
		list-style: none;
		&__icon {
			font-size: 0.9rem;
			transform: translateY(4px);
		}
		&__page:hover {
			color: gray;
		}
		&__page-is-active {
			text-decoration: underline;
			color: gray;
		}
	}
</style>
