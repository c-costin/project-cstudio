// @ts-nocheck
import { findAllLikeByUserId, findOrdersByUserId } from '$lib/js/request';

/** @type {import('./$types').LayoutServerLoad} */
export async function load({ locals, url }) {
	const userSession = locals.session.data.user;

	return {
		user: userSession,
		pathname: url.pathname,
		orders: await findOrdersByUserId(userSession.id, locals.session.data.token), 
		likes: await findAllLikeByUserId(userSession.id, locals.session.data.token)
	};
}