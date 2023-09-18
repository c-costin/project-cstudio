import { error } from '@sveltejs/kit';

/** @type {import('@sveltejs/kit').Handle} */
export async function handle({ event, resolve }) {
	const cookies = event.cookies;

	const connectedUser = cookies.get('ConnectedUser');

	if (event.url.pathname.startsWith('/profil')) {
		if (!connectedUser) {
			throw error(403, {
				message: 'Access Denied'
			});
		}
	}

	// const isAdmin = checkIsAdmin(cookies);

	// if (event.url.pathname.startsWith('/admin')) {
	// 	if (!isAdmin) {
	// 		throw error(403, {
	// 			message: 'Access Denied'
	// 		});
	// 	}
	// }

	const response = await resolve(event);
	return response;
}

// const checkIsAdmin = (cookies) => {
// 	const connectedUser = cookies.get('ConnectedUser');

// 	return connectedUser.role === "ROLE_ADMIN" 
// }