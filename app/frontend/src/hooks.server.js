// @ts-nocheck
import { handleSession } from 'svelte-kit-cookie-session';
import { redirect } from '@sveltejs/kit';

/** @type {import('@sveltejs/kit').Handle} */
export const handle = handleSession(
	{
		init: () => ({ token: undefined, user: undefined, cart: [] }),
		saveUninitialized: true,
		expires: 160, // 160 minutes
		expires_in: 'minutes', // minutes | hours | days | seconds
		secret: [
			{
				id: 4,
				secret: 'wZV7A4Em0w6QXn0wiuDQns6RiLT62evQ'
			},
			{
				id: 3,
				secret: 'DwEH6cb1yFqZgWG3cwu30v5CR9JWWgc6'
			},
			{
				id: 2,
				secret: 'MKrRr6UmZuBbNLozAvQaACMb7VK5xWrv'
			},
			{
				id: 1,
				secret: 'qjZYXL8TadkwGBsn5Mzja3FVa8FheAPt'
			}
		]
	},
	({ event, resolve }) => {
		const isConnected = event.locals.session.data.user;

		if (event.url.pathname.startsWith('/profil')) {
			if (!isConnected) {
				throw redirect(302, '/connexion');
			}
		}

		if (event.url.pathname.startsWith('/admin')) {
			// return console.log("ok");
				if (!isConnected || isConnected.role[0] === "ROLE_USER") {
					throw redirect(302, '/');
				}
		}

		return resolve(event);
	}
);
