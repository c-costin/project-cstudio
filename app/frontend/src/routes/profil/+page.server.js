// @ts-nocheck
import { findAllLikeByUserId, findOrdersByUserId } from '$lib/js/request';

/** @type {import('./$types').PageServerLoad} */
export async function load({ locals }) {
	const userSession = locals.session.data.user;

	return {
		user: userSession,
		orders: await findOrdersByUserId(userSession.id, locals.session.data.token), 
		likes: await findAllLikeByUserId(userSession.id, locals.session.data.token)
	};
}