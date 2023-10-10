<script lang="ts">
	// @ts-nocheck

	// Import generals style
	import '$lib/styles/app.scss';

	// Import utils
	import { UptoCaptilizer } from '$lib/js/utils.js';

	// Declare export variable
	export let data: LayoutServerData;

	let types = data.types;
</script>

<section class="types">
	{#each types as type, i (type.id)}
		<div class="types__row">
			<h3>{UptoCaptilizer(type.name)}</h3>
			<div class="types__actions">
				<button class="types__btn">supprimer</button>
				<button class="types__btn">editer</button>
			</div>
		</div>
		{#if types.length - 1 !== i}
			<div class="types__separator" />
		{/if}
	{/each}
</section>

<style lang="scss">
	.types {
		padding: 1rem 1.5rem;
		margin-top: 1rem;
		width: 100%;
		height: fit-content;
		display: flex;
		flex-direction: column;
		gap: 1rem;
		border-radius: 0.5rem;
		background: gainsboro;
		&__row {
			display: flex;
			justify-content: space-between;
		}
		&__actions {
			display: flex;
			gap: 0.5rem;
		}
		&__btn {
			padding: 0.25rem 0.75rem;
		}
		&__separator {
			width: 100%;
			height: 1px;
			background: darkgray;
		}
	}
</style>
