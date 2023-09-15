<script>
	import '$lib/styles/app.scss';
	const img = "http://localhost:8000/uploads/product/fzuif.png";
</script>

<aside class="dropdown-cart js-dropdown-cart hidden">
	<header class="dropdown-cart__header">
		<h4 class="dropdown-cart__title">Panier</h4>
		<p class="dropdown-cart__numbers">2</p>
	</header>
	<div class="dropdown-cart__separator" />
	<ul class="dropdown-cart__lists">
		<li class="dropdown-cart__item">
			<a href="dropdown-cart__link">
				<article class="dropdown-cart-article">
					<div class="dropdown-cart-article__top">
						<!-- svelte-ignore a11y-img-redundant-alt -->
						<img class="dropdown-cart-article__img" src="{img}" alt="Image" />
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
		<li class="dropdown-cart__item">
			<a href="dropdown-cart__link">
				<article class="dropdown-cart-article">
					<div class="dropdown-cart-article__top">
						<!-- svelte-ignore a11y-img-redundant-alt -->
						<img class="dropdown-cart-article__img" src="{img}" alt="Image" />
						<h3 class="dropdown-cart-article__name">Sport</h3>
					</div>
					<div class="dropdown-cart-article__bottom">
						<div class="dropdown-cart-article__quantity">
							<i class="iconoir-minus dropdown-cart-article__icon" />
							<p class="dropdown-cart-article___number">1</p>
							<i class="iconoir-plus dropdown-cart-article__icon" />
						</div>
						<p class="dropdown-cart-article___price">2000€</p>
					</div>
				</article>
			</a>
		</li>
	</ul>
	<div class="dropdown-cart__separator" />
	<footer class="dropdown-cart__footer">
		<h4 class="dropdown-cart__title">Total</h4>
		<p class="dropdown-cart__total">4200€</p>
	</footer>
	<button class="dropdown-cart__submit">Commmander</button>
</aside>

<style lang="scss">
	.dropdown-cart {
		position: absolute;
		top: 4rem;
		right: 1rem;
		padding: 0.75rem 1rem;
		width: 196px;
		display: flex;
		flex-direction: column;
		gap: 0.5rem;
		border-radius: 0.5rem;
		border: 1px solid rgba(255, 255, 255, 0.15);
		backdrop-filter: blur(3.1px);
		-webkit-backdrop-filter: blur(3.1px);
		box-shadow: 0 4px 30px rgba(0, 0, 0, 0.15);
		background: rgba(255, 255, 255, 0.9);
		&__header {
			display: flex;
			justify-content: space-between;
			align-items: center;
		}
		&__numbers {
			padding: 0.05rem 0.5rem;
			border-radius: 100%;
			background: gainsboro;
		}
		&__separator {
			width: 100%;
			height: 1px;
			background: black;
		}
		&__lists {
			display: flex;
			flex-direction: column;
			gap: 1rem;
			list-style: none;
		}

		&__footer {
			display: flex;
			justify-content: space-between;
			align-items: center;
		}
		&__submit {
			margin-top: 0.25rem;
			padding-block: 0.25rem;
			border-radius: 0.5rem;
			background: gainsboro;
			transition: 0.4s cubic-bezier(0.075, 0.82, 0.165, 1);
			&:hover {
				color: white;
				background: lightslategray;
			}
		}
	}

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
