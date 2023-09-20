import { findAllCategories, findAllProducts, findAllTypes } from '$lib/js/request.js';

/** @type {import('./$types').PageServerLoad} */
export async function load({ locals }) {
    return {
        products: findAllProducts(),
        types: findAllTypes(),
        categories: findAllCategories(),
		session: locals.session.data
    };
}