<script lang="ts">
	// @ts-nocheck

	// Import components
	import Header from '$lib/components/Header.svelte';
	import Form from '$lib/components/Admin/Form.svelte';
	import Footer from '$lib/components/Footer.svelte';
	import { findAllProductById } from '$lib/js/request.js';
	import { fade } from 'svelte/transition';
	import type { LayoutServerData } from './$types.js';

	export let data: LayoutServerData;

	// Declare variables
	let screenSize = 0;
	let isFormOpen = false;
	let product = undefined;
	let onEdit = false;

	// Declare Functionss
	const openFormAdd = () => {
		onEdit = false;
		isFormOpen = !isFormOpen;
	};
	const onEditProduct = async (e) => {
		onEdit = true;
		product = await findAllProductById(e.detail);
		isFormOpen = true;
	};
</script>

<svelte:head>
	<title>Tableau de bord | C-Studio - Plateform de vente en ligne d'oeuvre d'art</title>
</svelte:head>

<svelte:window bind:innerWidth={screenSize} />

<div class="wrapper">
	<Header />

	{#if screenSize > 1024}
		<main class="mainDashboard">
			<div class="dashboardActions">
				<nav class="dashboardMenu">
					<a
						href="/admin"
						class="dashboardMenu__btn {data.pathname === '/admin'
							? 'dashboardMenu__btn-active'
							: ''}"
					>
						Accueil
					</a>
					<a
						href="/admin/produits"
						class="dashboardMenu__btn {data.pathname === '/admin/produits'
							? 'dashboardMenu__btn-active'
							: ''}"
					>
						Produits
					</a>
					<a
						href="/admin/types"
						class="dashboardMenu__btn {data.pathname === '/admin/types'
							? 'dashboardMenu__btn-active'
							: ''}"
					>
						Types
					</a>
					<a
						href="/admin/categories"
						class="dashboardMenu__btn {data.pathname === '/admin/categories'
							? 'dashboardMenu__btn-active'
							: ''}"
					>
						Catégories
					</a>
					<a
						href="/admin/commandes"
						class="dashboardMenu__btn {data.pathname === '/admin/commandes'
							? 'dashboardMenu__btn-active'
							: ''}"
					>
						Commandes
					</a>
				</nav>

				<div class="dashboardActions__right">
					<button class="dashboardActions__addProduct" on:click={openFormAdd}>
						<svg
							xmlns="http://www.w3.org/2000/svg"
							width="24px"
							height="24px"
							fill="none"
							stroke-width="1.5"
							viewBox="0 0 24 24"
							color="#000000"
						>
							<path
								class="dashboardActions__icon"
								stroke="#000000"
								stroke-width="1.5"
								stroke-linecap="round"
								stroke-linejoin="round"
								d="M6 12h6m6 0h-6m0 0V6m0 6v6"
							/>
						</svg>
						ajouter
					</button>
				</div>
			</div>

			<div class="" transition:fade>
				<slot />
			</div>
			{#if isFormOpen}
				<Form {product} isEdit={onEdit} on:cancelForm={() => (isFormOpen = !isFormOpen)} />
			{/if}
		</main>
	{:else}
		<p class="main-is-disable">Veuillez utiliser un ordinateur pour cette page</p>
	{/if}
</div>

<Footer />

<style lang="scss">
	@use '../../lib/styles/variables' as *;
	.main-is-disable {
		margin-block: 4rem;
		text-align: center;
	}
	@media screen and (min-width: 1024px) {
		.mainDashboard {
			padding: 1.5rem;
			display: block;
		}
		.dashboardActions {
			display: flex;
			justify-content: space-between;
			&__right {
				display: flex;
				gap: 2rem;
			}
			&__addProduct {
				padding: 0.25rem 0.75rem;
				display: flex;
				gap: 0.25rem;
				align-items: center;
				font-weight: 700;
				font-size: 1.1rem;
				border-radius: 0.5rem;
				background: $color-green;
				transition: 0.15s ease-in-out;
				&:hover {
					color: $color-white;
				}
				&:hover .dashboardActions__icon {
					stroke: $color-white;
				}
			}
			&__icon {
				transition: 0.15s ease-in-out;
			}
		}
		.dashboardMenu {
			display: flex;
			row-gap: 0.5rem;
			flex-wrap: wrap;
			&__btn {
				margin-right: 0.5rem;
				padding: 0.25rem 0.75rem;
				border-radius: 0.5rem;
				border: 2px solid transparent;
				background: gainsboro;
			}
			&__btn-active {
				border: 2px solid black;
				background: #e2e2e240;
			}
		}
	}
</style>
