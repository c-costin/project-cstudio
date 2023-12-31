// @ts-nocheck
import { findAllCategories, findAllLikeByUserId, findAllProducts, findAllTypes } from '$lib/js/request.js';

/** @type {import('./$types').PageServerLoad} */
export async function load({ locals }) {
    const session = locals.session.data;
    if (session.user !== undefined) {
        return {
            products: await findAllProducts(),
            types: await findAllTypes(),
            categories: await findAllCategories(),
            session: session,
            likes: await findAllLikeByUserId(session.user.id, session.token)
        };
    }
    return {
        products: await findAllProducts(),
        types: await findAllTypes(),
        categories: await findAllCategories(),
		session: session,
        likes: undefined
    };
}