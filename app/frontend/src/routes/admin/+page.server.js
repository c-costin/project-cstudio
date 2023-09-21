import { findAllOrders, findAllProducts } from '$lib/js/request.js';

/** @type {import('./$types').PageServerLoad} */
export async function load({ locals }) {
	return {
		products: await findAllProducts(),
        orders: await findAllOrders(locals.session.data.token)
	};
}
