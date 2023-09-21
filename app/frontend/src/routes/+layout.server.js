// @ts-nocheck
/** @type {import('@sveltejs/kit').LayoutServerLoad} */
export function load({ locals }) {
	return {
		session: locals.session.data
	};
}