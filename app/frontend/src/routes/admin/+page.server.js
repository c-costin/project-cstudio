import { findAllCategories, findAllOrders, findAllProducts, findAllTypes } from '$lib/js/request.js';

/** @type {import('./$types').PageServerLoad} */
export async function load({ locals }) {
	return {
		products: await findAllProducts(),
		types: await findAllTypes(),
		categories: await findAllCategories(),
        orders: await findAllOrders(locals.session.data.token)
	};
}
