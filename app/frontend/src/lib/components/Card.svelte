<script>
	// @ts-nocheck

	// Import generals style
	import '$lib/styles/app.scss';

	// Import modules
	import { enhance } from '$app/forms';
	import { redirect } from '@sveltejs/kit';

	// Exporting variables
	export let isBig = false;
	export let likes;
	export let id;
	export let title;
	export let price;
	export let picture;

	// Variable
	let isLiked = false;

	// Handle statement
	$: if (likes !== undefined) {
		if (likes.code !== 404) {
			likes.forEach((like) => {
				if (id === like.id) isLiked = true;
			});
		}
	}
</script>

<article class="card {isBig ? 'cart-is-big' : ''}" data-product-id={id}>
	<a href="/produit/{id}" class="product-link">
		<img class="card__img" src={picture} alt="Image de {title}" />
	</a>
	<div class="card__content">
		<div class="card__favorite">
			<h3 class="card__title">{title}</h3>
			<form action="/produit?/{isLiked ? 'unlike' : 'like'}" method="post" use:enhance>
				<input type="hidden" name="id" value={id} />
				<button>
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
							class="favorite-content__icon {isLiked ? 'favorite-content__isLiked' : ''}"
							stroke-width="1.5"
							stroke-linejoin="round"
							d="M22 8.862a5.95 5.95 0 0 1-1.654 4.13c-2.441 2.531-4.809 5.17-7.34 7.608-.581.55-1.502.53-2.057-.045l-7.295-7.562c-2.205-2.286-2.205-5.976 0-8.261a5.58 5.58 0 0 1 8.08 0l.266.274.265-.274A5.612 5.612 0 0 1 16.305 3c1.52 0 2.973.624 4.04 1.732A5.95 5.95 0 0 1 22 8.862Z"
						/>
					</svg>
				</button>
			</form>
		</div>
		<p class="card__price">{price} €</p>
	</div>
</article>

<style lang="scss">
	@use '../styles/variables' as *;
	.card {
		padding: 0.25rem 0.5rem;
		width: 100%;
		height: fit-content;
		&__img {
			width: 100%;
			aspect-ratio: 5/6;
			border-radius: 1.5rem;
			border: 3px solid transparent;
			filter: brightness(0.9);
			object-fit: cover;
			transition: 0.1s ease-in-out;
		}
		&__content {
			padding: 0.5rem 0.25rem;
			display: flex;
			justify-content: space-between;
			font-weight: 700;
		}
		&__favorite {
			display: flex;
			gap: 1rem;
		}
		&:hover &__img {
			scale: 98%;
			border: 3px solid $color-black;
		}
	}
	.favorite-content {
		&__icon {
			stroke: $color-black;
			fill: transparent;
		}
		&__isLiked {
			fill: $color-red;
		}
	}
	.cart-is-big {
		grid-column: span 2;
		grid-row: span 2;
	}
</style>
