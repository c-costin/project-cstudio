<script>
	export let id;
    export let title;
    export let price;
    export let picture;
	export let description;
	export let dimensions;
	export let releaseDate;
	export let artist;
	export let type;
	export let categories;
</script>

<li class="dropdown-cart__item">
    <a href="/produit/{id}" class="dropdown-cart__link">
        <article class="dropdown-cart-article">
            <div class="dropdown-cart-article__top">
                <img class="dropdown-cart-article__img" src="{picture}" alt="Image de l'oeuvre {title}" />
                <h3 class="dropdown-cart-article__name">{title}</h3>
            </div>
            <div class="dropdown-cart-article__bottom">
                <div class="dropdown-cart-article__quantity">
                    <i class="iconoir-minus dropdown-cart-article__icon" />
                    <p class="dropdown-cart-article___number">1</p>
                    <i class="iconoir-plus dropdown-cart-article__icon" />
                </div>
                <p class="dropdown-cart-article___price">{price} €</p>
            </div>
        </article>
    </a>
</li>

<style lang="scss">
    	.dropdown-cart-article {
		width: 100%;
		display: flex;
		flex-direction: column;
		gap: 0.5rem;
		&__top {
			display: flex;
			justify-content: space-between;
		}
		&__img {
			width: 4rem;
			aspect-ratio: 4/3;
			border-radius: 0.25rem;
			background: lightslategray;
			object-fit: cover;
		}
		&__bottom {
			display: flex;
			justify-content: space-between;
		}
		&__quantity {
			display: flex;
			align-items: center;
			gap: 0.5rem;
		}
	}
</style>