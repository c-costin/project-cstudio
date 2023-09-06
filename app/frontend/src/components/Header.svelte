<script>
	import Search from './Search.svelte';
	import Menu from './Menu.svelte';
	import DropdownProfil from './DropdownProfil.svelte';
	import DropdownCart from './DropdownCart.svelte';
	import iconMenu from '$lib/icons/menu.svg';
	import iconSearch from '$lib/icons/search.svg';
	import iconProfil from '$lib/icons/profile-circle.svg';
	import iconCart from '$lib/icons/simple-cart.svg';

	// Declare variables
	let isMenuOpen = false;
	let isSearchOpen = false;
	let isProfilOpen = false;
	let isCartOpen = false;

	// Declare Functions
	const toggleOpenMenu = () => {isMenuOpen = !isMenuOpen};
	const toggleOpenSearch = () => {isSearchOpen = !isSearchOpen};
	const toggleOpenProfil = () => {isProfilOpen = !isProfilOpen};
	const toggleOpenCart = () => {isCartOpen = !isCartOpen};

	// Hanlde statements
	$: {
		if (isSearchOpen || isMenuOpen) {
			isProfilOpen = false;
			isCartOpen = false;
		}
		if (isProfilOpen && !isCartOpen) {
			isCartOpen = false
		}
	}
</script>

<header class="header">

	{#if isSearchOpen} <Search /> {/if}

	{#if isMenuOpen} <Menu on:closeMenu={toggleOpenMenu} /> {/if}

	<div class="header__left">
		<button on:click={toggleOpenMenu}>
			<img src="{iconMenu}" alt="Icon du menu" class="header__icon">
		</button>
		<button on:click={toggleOpenSearch}>
			<img src="{iconSearch}" alt="Icon de la recherche" class="header__icon">
		</button>
	</div>

	<a href="/" class="header__title">C-Studio</a>

	<div class="header__right">
		<button on:click={toggleOpenProfil}>
			<img src="{iconProfil}" alt="Icon du profil" class="header__icon">
		</button>
		<button on:click={toggleOpenCart}>
			<img src="{iconCart}" alt="Icon du panier" class="header__icon">
		</button>
	</div>

	{#if isProfilOpen} <DropdownProfil /> {/if}

	{#if isCartOpen} <DropdownCart /> {/if}

</header>

<style lang="scss">
	.header {
		padding: 1.5rem;
		display: flex;
		justify-content: space-between;
		align-items: center;
		flex-wrap: wrap;
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
</style>
