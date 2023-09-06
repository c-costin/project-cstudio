<script>
    	import '$lib/styles/app.scss';
        import Header from '../../components/Header.svelte';
	    import Footer from '../../components/Footer.svelte';
	    import Card from '../../components/Card.svelte';

        let products = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11];
</script>

<svelte:head>
    <title>C-Studio - Recherche</title>
</svelte:head>
  

<div class="wrapper">
    <Header />
    <main class="main">
        <div class="result">
            <h1 class="result__title">"Résultat"</h1>
        </div>

        <section class="list-products">
			      {#each products as product, i}
					    <Card />
			      {/each}
		    </section>
      </main>
</div>


<Footer />

<style>

.result {
    margin-inline: auto;
    padding-top: 2rem;
    padding-bottom: 2rem;
    padding-inline: 2rem;
    max-width: 150%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: .25rem;
    &__title {
      width: 100%;
      text-align: center;
    }
  }
.list-products {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 1rem;
}

.card {
  &__img {
    width: 100%;
    aspect-ratio: 4/5;
    border-radius: .5rem;
    background: lightslategray;
    &:hover {
      border-radius: .5rem;
      border: 2px solid black
    }
  }
  &__content{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }
}

.cart-is-big {
  grid-column : span 2;
  grid-row : span 2;
}

.cart-is-big .card {
  width: 100%;
}

@media screen and (min-width: 640px) {
  .list-products {
    grid-template-columns: repeat(4, 1fr);
  }
}
</style>