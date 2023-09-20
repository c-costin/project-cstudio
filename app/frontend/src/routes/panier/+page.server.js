// @ts-nocheck

import { endpoint } from '$lib/js/request.js';

/** @type {import('./$types').Actions} */
export const actions = {
	add: async ({ request, fetch, locals }) => {
		const form = await request.formData();

		const productId = form.get('id');
		const productQuantity = form.get('quantity');

		await locals.session.update(({ cart }) => ({
			cart: [...cart, { id: productId, quantity: productQuantity }]
		}));

		return {};
	}
};
