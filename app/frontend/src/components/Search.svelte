<script>
	import '$lib/styles/app.scss';
</script>

<aside class="aside-search js-aside-search hidden">
    <form class="search">
        <i class="iconoir-search search__icon"></i>
        <input placeholder="Recheche..." class="search__input">
    </form>
</aside>

<style lang="scss">

.aside-search {
  width: 100;
  height: 4rem;
}

.search {
  padding-left: .75rem;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  gap: .75rem;
  border-bottom: 2px solid black;
  &__icon {
    font-size: 1.5rem;
  }
  &__input {
    padding-right: .5rem;
    width: 100%;
    font-size: 1.2rem;
    &:focus {
      outline: none;
    }
  }
}
</style>