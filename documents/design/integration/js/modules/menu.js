const Menu = {
    // Find HTML Elements
    iconOpenElement: document.querySelector(".js-icon-open"),
    iconCloseElement: document.querySelector(".js-icon-close"),
    menuElement: document.querySelector(".menu"),

    // Initialization
    init: function() {
        this.attachEvents();
    },

    // Attach Events
    attachEvents: function() {
        this.iconOpenElement.addEventListener("click", this.handleDisplayMenu);
        this.iconCloseElement.addEventListener("click", this.handleDisplayMenu);
    },

    // Handle display menu
    handleDisplayMenu: function() {
        document.body.classList.toggle("disable-scroll")
        Menu.menuElement.classList.toggle("hidden");
    },
};

export default Menu;