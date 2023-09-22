<script>
    // @ts-nocheck

	// Import generals style
	import '$lib/styles/app.scss';

    // Import modules
	import { enhance } from '$app/forms';
	import { createEventDispatcher } from 'svelte';
    
    const dispatch = createEventDispatcher();
</script>

<form class="formProduct" action="/admin?/add-product" method="post" use:enhance>
	<h2>Ajouter un produit</h2>
	<div class="formProduct__field">
		<label class="formProduct__label" for="title">Titre</label>
		<input class="formProduct__input" type="text" name="title" />
	</div>
	<div class="formProduct__field">
		<label class="formProduct__label" for="artist">Artiste</label>
		<input class="formProduct__input" type="text" name="artist" />
	</div>
	<div class="formProduct__field">
		<label class="formProduct__label" for="description">Description</label>
		<textarea class="formProduct__textarea" name="description" />
	</div>
	<div class="formProduct__row">
		<div class="formProduct__col">
			<label class="formProduct__label" for="width">Largeur</label>
			<p>
				<input class="formProduct__input" type="number" name="width" /> cm
			</p>
		</div>
		<div class="formProduct__col">
			<label class="formProduct__label" for="height">Hauteur</label>
			<p>
				<input class="formProduct__input" type="number" name="height" /> cm
			</p>
		</div>
		<div class="formProduct__col">
			<label class="formProduct__label" for="releaseDate">Date de création</label>
			<input class="formProduct__input" type="date" name="releaseDate" />
		</div>
	</div>
	<div class="formProduct__row">
		<div class="formProduct__col">
			<label class="formProduct__label" for="price">Prix</label>
			<input class="formProduct__input" type="number" name="price" />
		</div>
		<div class="formProduct__col">
			<label class="formProduct__label" for="stock">Stock</label>
			<input class="formProduct__input" type="number" name="stock" />
		</div>
	</div>
	<div class="formProduct__row">
		<label class="formProduct__label" for="file">Téléchargez une image</label>
		<input class="formProduct__" type="file" name="file" />
	</div>
	<div class="formProduct__actions">
		<button class="formProduct__btn formProduct__cancel" on:click|preventDefault={() => dispatch('cancelForm')}>annuler</button>
		<button class="formProduct__btn formProduct__add">ajouter</button>
	</div>
</form>

<style lang="scss">
	@use '../../styles/variables' as *;
	.formProduct {
		position: absolute;
		top: 16rem;
		left: 50%;
		padding: 2rem;
		width: 65vw;
		display: flex;
		flex-direction: column;
		gap: 2rem;
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
			display: flex;
			gap: 0.5rem;
		}
		&__input {
			border-radius: 0.5rem;
			box-shadow: rgba(0, 0, 0, 0.06) 0px 2px 4px 0px inset;
		}
		&__textarea {
			border-radius: 0.5rem;
			box-shadow: rgba(0, 0, 0, 0.06) 0px 2px 4px 0px inset;
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
