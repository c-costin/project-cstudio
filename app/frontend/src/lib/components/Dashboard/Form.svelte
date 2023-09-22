<script>
	// @ts-nocheck

	// Import generals style
	import '$lib/styles/app.scss';

	// Import module
	import { enhance } from '$app/forms';
</script>

<section class="formContent">
	<form action="/admin?/add" method="post" use:enhance>
		<input type="text" />
	</form>
</section>

<style lang="scss">
	.formContent {
		padding: 1rem 1.5rem;
		margin-top: 1rem;
		width: 100%;
		height: fit-content;
		display: flex;
		flex-direction: column;
		gap: 1rem;
		border-radius: 0.5rem;
		background: gainsboro;
	}
</style>
