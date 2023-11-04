// @ts-nocheck
import { fail, redirect } from '@sveltejs/kit';

/** @type {import('./$types').Actions} */
export const actions = {
	login: async ({ request, fetch, locals }) => {
		const form = await request.formData();

		const email = form.get('email');
		const password = form.get('password');

		// Check is valid credentials
		if (typeof email !== 'string' || typeof password !== 'string') {
			return fail(400, { invalid: true });
		}

		// Request API for login check
		const req = await fetch('https://api.cstudio.costincadeau.fr/api/login_check', {
			method: 'POST',
			headers: {
				Accept: '*/*',
				'Content-Type': 'application/json'
			},
			body: JSON.stringify({
				email: email,
				password: password
			})
		});

		// Convert response to object
		const result = await req.json();

		// Check is invalid credentials
		if (req.status === 401) {
			return fail(400, { credentials: true });
		}

		if (req.status === 200) {
			// Insert to session token and user
			await locals.session.update(({ token }) => ({ token: result.token }));
			await locals.session.update(({ user }) => ({ user: result.user }));

			// Redirection to home page
			throw redirect(302, '/');
		}
	}
};
