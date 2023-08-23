import Menu from './modules/menu.js';
import Search from './modules/search.js';

const Main = {
    init: function() {
        Menu.init();
        Search.init();
    },
}

document.addEventListener("DOMContentLoaded", Main.init);