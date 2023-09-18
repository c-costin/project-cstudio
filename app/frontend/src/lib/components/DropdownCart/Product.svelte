<script>
    export let title;
    export let price;
    export let picture;
</script>

<li class="dropdown-cart__item">
    <a href="dropdown-cart__link">
        <article class="dropdown-cart-article">
            <div class="dropdown-cart-article__top">
                <!-- svelte-ignore a11y-img-redundant-alt -->
                <img class="dropdown-cart-article__img" src="" alt="Image" />
                <h3 class="dropdown-cart-article__name">Nature</h3>
            </div>
            <div class="dropdown-cart-article__bottom">
                <div class="dropdown-cart-article__quantity">
                    <i class="iconoir-minus dropdown-cart-article__icon" />
                    <p class="dropdown-cart-article___number">1</p>
                    <i class="iconoir-plus dropdown-cart-article__icon" />
                </div>
                <p class="dropdown-cart-article___price">2200€</p>
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