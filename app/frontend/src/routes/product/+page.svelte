<script>
    import '$lib/styles/app.scss';
	import Header from '../../components/Header.svelte';
    import Footer from "../../components/Footer.svelte";

    let productNumber = 1
    let price = 1200
    $: Calculatedprice = productNumber * price

    function incrementCount() {
		//incremtent
		productNumber++
	}

    function decreaseCount() {
        if (productNumber <= 0){
            return
        }
		productNumber--
        
	}

</script>

<svelte:head>
    <title>C-Studio - Product</title>
</svelte:head>

<body>
<div class="container">
    
<Header />
       
    <main class="main">
        <section class="product">
            <img class="product__img" src="#" alt="Image">
            <div class="product__info">
                <h1 class="product__type">Type</h1>
                <h2 class="product__title">Titre du produit</h2>
                <h3 class="product__category">Catégorie</h3>
                <summary class="product__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe
                    ab ex dignissimos facilis commodi, placeat tempora ipsa autem voluptatem blanditiis inventore
                    iusto quos suscipit repellat ea est quo dicta dolore. Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Quas aspernatur sunt, dolor temporibus facere voluptatum beatae aut, sit magni aliquam!</summary>

                <div class="product__purchase">
                    <div class="product__quantity">
                        <button on:click={decreaseCount}><i class="iconoir-minus product__icon"></i> </button>
                        <p class="product__number">{productNumber}</p>
                        <button on:click={incrementCount}><i class="iconoir-plus product__icon"></i> </button>
                    </div>
                    <div class="product__price">
                        <p>{Calculatedprice}€</p>
                    </div>
                </div>
                <button class="product__addToCart"> Ajouter au panier</button> 
            </div>
        </section>
    </main>
</div>

<Footer />
</body>

<style lang="scss">
    .product {
    display: flex;
    flex-direction: column;
    margin-top: 5rem;
    max-width: 892px;
    margin-inline: auto;

    &__info {
        display:flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    &__img {
        width: 100%;
        height: auto;
        aspect-ratio: 5/4;
        border-radius: 0.25rem;
        background: lightslategrey;
        margin-bottom: 2rem;
    }

    &__purchase {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    &__price {
        font-size: 1.2rem;
        font-weight: bold ;
    }

    &__quantity {
        width: fit-content;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        margin: 1rem 0;
    }

    &__number {
        border: solid 1px lightgray;
        border-radius: 5%;
        background-color: lightgray;
        padding: 0 0.3rem;
    }

    &__addToCart {
        width: 100%;
    }
}

@media screen and (min-width: 768px) {
    .product{
        width: 80%;
        margin-top: 3rem;
    }
}

@media screen and (min-width: 992px) {
    .product {
        flex-direction: row;
        gap: 2rem;
        &__info {
            width: 50%;
        }
        &__img {
            margin: 0;
        }
    }
} 
</style>
