// @ts-nocheck

import { addUserLike, removeUserLike } from '$lib/js/request';
import { redirect } from '@sveltejs/kit';

/** @type {import('./$types').Actions} */
export const actions = {
	like: async ({ request, locals }) => {
		if (locals.session.data.user) {
			const form = await request.formData();

			const productId = form.get('id');
			const userId = locals.session.data.user.id;

			await addUserLike(productId, userId, locals.session.data.token);

			throw redirect(302, '/');
		}

		throw redirect(302, '/connexion');
	},

	unlike: async ({ request, locals }) => {
		const form = await request.formData();

		const productId = form.get('id');
		const userId = locals.session.data.user.id;

		await removeUserLike(productId, userId, locals.session.data.token);

		throw redirect(302, '/');
	}
};
