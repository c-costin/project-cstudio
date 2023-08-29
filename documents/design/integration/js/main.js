import Menu from './modules/menu.js';
import Search from './modules/search.js';
import Dropdowns from './modules/dropdowns.js';

const Main = {
    init: function() {
        Menu.init();
        Search.init();
        Dropdowns.init();
    },
}

document.addEventListener("DOMContentLoaded", Main.init);