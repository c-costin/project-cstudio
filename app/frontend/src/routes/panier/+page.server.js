// @ts-nocheck

/** @type {import('./$types').Actions} */
export const actions = {
	add: async ({ request, locals }) => {
		const form = await request.formData();

		const productId = form.get('id');
		const productQuantity = form.get('quantity');

		await locals.session.update(({ cart }) => ({
			cart: [...cart, { id: productId, quantity: productQuantity }]
		}));

		return {};
	},
	remove: async ({request, locals}) => {
		const form = await request.formData();

		const productId = form.get('id');
		const products = locals.session.data.cart

		await locals.session.update(({ cart }) => ({
			cart: products.filter((item) => item.id != productId)
		}));

		return {};
	}
};
