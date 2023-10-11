<script>
	// Import icons
	import logo from '$lib/icons/logo.svg';
	import iconMenu from '$lib/icons/menu.svg';
	import iconSearch from '$lib/icons/search.svg';
	import iconProfil from '$lib/icons/profile-circle.svg';
	import iconCart from '$lib/icons/simple-cart.svg';

	// Import components
	import Search from '$lib/components/Search.svelte';
	import Menu from '$lib/components/Menu.svelte';
	import DropdownProfil from '$lib/components/DropdownProfil.svelte';
	import DropdownCart from '$lib/components/DropdownCart/DropdownCart.svelte';

	// Declare variables
	let screenSize = 0;
	let isMenuOpen = false;
	let isSearchOpen = false;
	let isProfilOpen = false;
	let isCartOpen = false;

	// Declare Functions
	const toggleOpenMenu = () => {
		isMenuOpen = !isMenuOpen;
		document.body.classList.toggle('scroll-lock');
	};
	const toggleOpenSearch = () => isSearchOpen = !isSearchOpen;
	const toggleOpenProfil = () => isProfilOpen = !isProfilOpen;
	const toggleOpenCart = () => isCartOpen = !isCartOpen;
</script>

<svelte:window bind:innerWidth={screenSize} />

{#if isSearchOpen} <Search /> {/if}

<header class="header">
	<div class="header__left-isDesktop">
		{#if isMenuOpen || screenSize > 992}
			<Menu on:closeMenu={toggleOpenMenu} />
		{/if}

		<div class="header__left">
			<button on:click={toggleOpenMenu}>
				<img src={iconMenu} alt="Icon du menu" class="header__icon header__icon-isOpenMenu" />
			</button>
			<button on:click={toggleOpenSearch}>
				<img src={iconSearch} alt="Icon de la recherche" class="header__icon" />
			</button>
		</div>
	</div>

	<a href="/" class="header__logo">
		<img src={logo} alt="Logo de l'entreprise C-Studio" />
	</a>

	<div class="header__right">
		<button on:click={toggleOpenProfil}>
			<img src={iconProfil} alt="Icon du profil" class="header__icon" />
		</button>
		<button on:click={toggleOpenCart}>
			<img src={iconCart} alt="Icon du panier" class="header__icon" />
		</button>
	</div>

	{#if isProfilOpen} <DropdownProfil /> {/if}

	{#if isCartOpen} <DropdownCart /> {/if}
</header>

<style lang="scss">
	@use '../styles/variables' as *;

	.header {
		padding: 1.5rem;
		display: flex;
		justify-content: space-between;
		align-items: center;
		flex-wrap: wrap;
		background: transparent;
		&__left {
			z-index: 1;
			display: flex;
			align-items: center;
			gap: 1rem;
		}
		&__logo {
			z-index: 10;
			width: 96px;
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
		&__icon:nth-child(1) {
			z-index: 10;
		}
	}

	@media screen and (min-width: 992px) {
		.header__icon-isOpenMenu {
			display: none;
		}
		.header__left-isDesktop {
			width: 256px;
			display: flex;
			gap: 1rem;
		}
		.header__right {
			width: 256px;
			justify-content: flex-end;
		}
	}
</style>
