import { redirect } from '@sveltejs/kit';

/** @type {import('@sveltejs/kit').Handle} */
export async function handle({ event, resolve }) {
	const cookies = event.cookies;

	const connectedUser = cookies.get('ConnectedUser');

	if (event.url.pathname.startsWith('/profil')) {
		if (!connectedUser) {
			throw redirect(303, "/connexion");
		}
	}

	if (event.url.pathname.startsWith('/admin')) {
		if (!connectedUser) {
			throw redirect(303, "/connexion");
		}
	}

	const response = await resolve(event);
	return response;
}