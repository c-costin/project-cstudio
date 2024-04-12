// @ts-nocheck
import { redirect } from '@sveltejs/kit';

/** @type {import('./$types').Actions} */
export const actions = {
	logout: async ({ locals }) => {
		await locals.session.destroy();

		throw redirect(302, '/');
	}
};
