import Menu from './modules/menu.js'

const Main = {
    init: function() {
        Menu.init();
    },
}

document.addEventListener("DOMContentLoaded", Main.init);