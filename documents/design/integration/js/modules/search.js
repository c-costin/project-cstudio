const Search = {
    // Find HTML Elements
    iconOpenElement: document.querySelector(".js-icon-open"),
    iconCloseElement: document.querySelector(".js-icon-close"),
    searchElement: document.querySelector("."),

    // Initialization
    init: function() {
        this.attachEvents();
    },

    // Attach Events
    attachEvents: function() {
        this.iconOpenElement.addEventListener("click", this.handleDisplayMenu);
        this.iconCloseElement.addEventListener("click", this.handleDisplayMenu);
    },

    // Handle display search
    handleDisplaySearch: function() {
        document.body.classList.toggle("disable-scroll")
        Menu.menuElement.classList.toggle("hidden");
    },
};

export default Search;