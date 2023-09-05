<script>
	import Menu from './Menu.svelte';

	const handleDisplaySearch = function() {}

	export let active = false;

	function toggleMenu() {
		active = !active;
	}
</script>

<header class="header">
	{#if active}
		<Menu on:toggleMenuChild={toggleMenu}/>
	{/if}
	<div class="header__left">
		<i class="iconoir-menu header__icon js-icon-open" on:click={toggleMenu}/>
		<i class="iconoir-search header__icon js-search" on:click={handleDisplaySearch}/>
	</div>
	<a href="#" class="header__title">C-Studio</a>
	<div class="header__right">
		<i class="iconoir-profile-circle header__icon js-profil-icon" />
		<i class="iconoir-simple-cart header__icon js-cart-icon" />
	</div>
</header>

<style lang="scss">
	.header {
		padding: 1.5rem;
		display: flex;
		justify-content: space-between;
		align-items: center;
		&__left {
			display: flex;
			align-items: center;
			gap: 1rem;
		}
		&__title {
			z-index: 10;
			font-size: 1.5rem;
		}
		&__right {
			z-index: 10;
			display: flex;
			gap: 1rem;
		}
		&__icon {
			font-size: 1.5rem;
			&:hover {
				cursor: pointer;
			}
		}
		&__icon:nth-child(3) {
			z-index: 10;
		}
	}

	@media screen and (min-width: 992px) {
		.js-icon-open {
			display: none;
		}
	}
</style>
