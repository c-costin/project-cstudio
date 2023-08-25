const Dropdowns = {
    // Get HTML Elements
    iconDropdownProfilElement: document.querySelector(".js-profil-icon"),
    iconDropdownCartElement: document.querySelector(".js-cart-icon"),
    dropdownProfilElement: document.querySelector(".js-dropdown-profil"),
    dropdownCartElement: document.querySelector(".js-dropdown-cart"),

    // Initialization
    init: function() {
        this.attachEvents();
    },

    // Attach All Events
    attachEvents: function() {
        this.iconDropdownProfilElement.addEventListener("click", this.handleDisplayDropdownProfil);
        this.iconDropdownCartElement.addEventListener("click", this.handleDisplayDropdownCart);
    },

    // Handle display dropdown profil
    handleDisplayDropdownProfil: function() {
        Dropdowns.dropdownProfilElement.classList.toggle("hidden");
    },

    // Handle display dropdown cart
    handleDisplayDropdownCart: function() {
        Dropdowns.dropdownCartElement.classList.toggle("hidden");
    },
}

export default Dropdowns;