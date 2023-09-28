<script>
	// @ts-nocheck

	// Import generals style
	import '$lib/styles/app.scss';

	// Import modules
	import { enhance } from '$app/forms';
	import { createEventDispatcher } from 'svelte';

	// Declare export variables
	export let isEdit = false;
	export let product;

	// Declare variable
	const dispatch = createEventDispatcher();
</script>

<form class="formProduct" action="/admin?/add-product" method="post" use:enhance>
	<h2>{isEdit ? 'Modifier' : 'Ajouter'} une œuvre</h2>
	<div class="formProduct__field">
		<label class="formProduct__label" for="title">Titre</label>
		<input
			class="formProduct__input"
			type="text"
			name="title"
			value={isEdit ? product.title : ''}
		/>
	</div>
	<div class="formProduct__field">
		<label class="formProduct__label" for="artist">Artiste</label>
		<input
			class="formProduct__input"
			type="text"
			name="artist"
			value={isEdit ? product.artist : ''}
		/>
	</div>
	<div class="formProduct__field">
		<label class="formProduct__label" for="description">Description</label>
		<textarea
			class="formProduct__textarea"
			name="description"
			value={isEdit ? product.description : ''}
		/>
	</div>
	<div class="formProduct__row">
		<div class="formProduct__col">
			<label class="formProduct__label" for="dimensions">Dimensions</label>
			<input
				class="formProduct__input"
				type="text"
				name="height"
				min="1"
				value={isEdit ? product.dimensions : ''}
			/>
		</div>
		<div class="formProduct__col">
			<label class="formProduct__label" for="releaseDate">Année de création</label>
			<input
				class="formProduct__input"
				type="number"
				name="releaseDate"
				value={isEdit ? product.releaseDate : ''}
			/>
		</div>
	</div>
	<div class="formProduct__row">
		<div class="formProduct__col">
			<label class="formProduct__label" for="price">Prix (€)</label>
			<input
				class="formProduct__input"
				type="number"
				name="price"
				min="1"
				value={isEdit ? product.price : ''}
			/>
		</div>
		<div class="formProduct__col">
			<label class="formProduct__label" for="stock">Stock</label>
			<input
				class="formProduct__input"
				type="number"
				name="stock"
				min="1"
				value={isEdit ? product.stock : ''}
			/>
		</div>
	</div>
	<div class="formProduct__field">
		<label class="formProduct__label" for="file">{isEdit ? 'Image actuel :' : 'Téléchargez une image'}</label>
		{#if isEdit}
			<img class="formProduct__img" src="{product.picture}" alt="Image de l'œuvre {product.title}">
		{/if}
		<input class="formProduct__file" type="file" name="file" />
	</div>
	<div class="formProduct__actions">
		<button
			class="formProduct__btn formProduct__cancel"
			on:click|preventDefault={() => dispatch('cancelForm')}
		>
			annuler
		</button>
		<button class="formProduct__btn formProduct__add">
			{isEdit ? 'modifier' : 'ajouter'}
		</button>
	</div>
</form>

<style lang="scss">
	@use '../../styles/variables' as *;
	.formProduct {
		position: absolute;
		top: 12rem;
		left: 50%;
		padding: 2rem;
		width: 65vw;
		max-width: 896px;
		display: flex;
		flex-direction: column;
		gap: 1rem;
		border-radius: 0.5rem;
		border: 1px solid rgba(255, 255, 255, 0.15);
		backdrop-filter: blur(3.1px);
		-webkit-backdrop-filter: blur(3.1px);
		box-shadow: 0 4px 30px rgba(0, 0, 0, 0.15);
		background: rgba(245, 245, 245, 0.95);
		transform: translateX(-50%);
		&__field {
			display: flex;
			flex-direction: column;
		}
		&__row {
			display: flex;
			gap: 2rem;
		}
		&__col {
			width: 50%;
			display: flex;
			flex-direction: column;
		}
		&__label {
			margin-bottom: 0.25rem;
		}
		&__text {
			width: 100%;
			display: flex;
			gap: 0.5rem;
			align-items: center;
		}
		&__input {
			width: 100%;
			padding: 0.25rem 0.5rem;
			border-radius: 0.5rem;
			box-shadow: rgba(0, 0, 0, 0.06) 0px 2px 4px 0px inset;
		}
		&__textarea {
			padding: 0.25rem 0.5rem;
			border-radius: 0.5rem;
			box-shadow: rgba(0, 0, 0, 0.06) 0px 2px 4px 0px inset;
		}
		&__file {
			padding: 0.5rem;
			border-radius: 0.5rem;
			background: white;
			box-shadow: rgba(0, 0, 0, 0.06) 0px 2px 4px 0px inset;
		}
		&__img {
			margin-block: 0.5rem;
			max-height: 296px;
			border-radius: 0.5rem;
			background: white;
			object-fit: contain;
		}
		&__actions {
			align-self: flex-end;
			display: flex;
			gap: 1rem;
		}
		&__btn {
			margin-top: 1rem;
			padding: 0.25rem 1.5rem;
			font-weight: 700;
			font-size: 1.1rem;
			border-radius: 0.5rem;
			transition: 0.15s ease-in-out;
			&:hover {
				color: $color-white;
			}
		}
		&__add {
			background: $color-green;
		}
		&__cancel {
			background: $color-red;
		}
	}
</style>
