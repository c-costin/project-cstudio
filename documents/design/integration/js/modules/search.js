const Search = {
    // Find HTML Elements
    iconSearchElement: document.querySelector(".js-search"),
    searchElement: document.querySelector(".js-aside-search"),

    // Initialization
    init: function() {
        Search.attachEvents();
    },

    // Attach Events
    attachEvents: function() {
        this.iconSearchElement.addEventListener("click", this.handleDisplaySearch);
    },

    // Handle display search
    handleDisplaySearch: function() {
        Search.searchElement.classList.toggle("hidden");
    },
};

export default Search;