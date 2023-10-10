import { findAllCategories, findAllOrders, findAllProducts, findAllTypes } from '$lib/js/request.js';

/** @type {import('./$types').LayoutServerLoad} */
export async function load({ locals, url }) {
	return {
		pathname: url.pathname,
		products: await findAllProducts(),
		types: await findAllTypes(),
		categories: await findAllCategories(),
		orders: await findAllOrders(locals.session.data.token)
	};
}
