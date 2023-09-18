<script>
	import '$lib/styles/app.scss';
</script>

<section class="profil-content">
	<form class="profil-data">
		<div class="profil-data__container">
			<div class="profil-data__row">
				<label for="fristName" class="profil-data__label">Prénom</label>
				<input type="text" name="fristName" class="profil-data__input" placeholder="John" />
			</div>
			<div class="profil-data__row">
				<label for="lastName" class="profil-data__label">Nom</label>
				<input type="text" name="lastName" class="profil-data__input" placeholder="Doe" />
			</div>
		</div>
		<div class="profil-data__row">
			<label for="email" class="profil-data__label">Email</label>
			<input type="email" name="email" class="profil-data__input" placeholder="john.doe@mail.com" />
		</div>
		<div class="profil-data__row">
			<label for="oldPassword" class="profil-data__label">Ancien mot de passe</label>
			<input type="password" name="oldPassword" class="profil-data__input" />
		</div>
		<div class="profil-data__container">
			<div class="profil-data__row">
				<label for="newPassword" class="profil-data__label">Nouveau mot de passe</label>
				<input type="password" name="newPassword" class="profil-data__input" />
			</div>
			<div class="profil-data__row">
				<label for="comfirmPassword" class="profil-data__label">Comfirmer mot de passe</label>
				<input type="password" name="comfirmPassword" class="profil-data__input" />
			</div>
		</div>
	</form>
	<div class="profil-action">
		<button class="profil-action__btn profil-action__btn-deleting">Supprimer mon compte</button>
		<button class="profil-action__btn">Editer</button>
	</div>
</section>

<style lang="scss">
	.profil-content {
		margin-top: 1rem;
		width: 100%;
		height: fit-content;
		display: flex;
		flex-direction: column;
		border-radius: 0.5rem;
		background: gainsboro;
	}

	.profil-data {
		padding: 1rem 1.25rem;
		width: 100%;
		display: flex;
		flex-direction: column;
		gap: 1rem;
		&__container {
			display: flex;
			flex-direction: column;
			gap: 1rem;
		}
		&__row {
			display: flex;
			flex-direction: column;
			gap: 0.25rem;
		}
		&__input {
			padding: 0.25rem 0.5rem;
			border-radius: 0.25rem;
		}
	}

	.profil-action {
		padding: 1rem 1.25rem;
		align-self: flex-end;
		display: flex;
		gap: 0.75rem;
		&__btn {
			padding: 0.25rem 0.75rem;
			border-radius: 0.5rem;
		}
		&__btn-deleting {
			color: white;
			background: red;
		}
	}

	@media screen and (min-width: 992px) {
		.profil-data {
			padding: 2rem 2.5rem;
			&__container {
				flex-direction: row;
			}
			&__container &__row {
				width: 100%;
			}
		}
	}
</style>
