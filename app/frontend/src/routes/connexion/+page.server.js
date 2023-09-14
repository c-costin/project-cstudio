import { setAuthToken } from '$lib/utils';
import { fail, redirect } from '@sveltejs/kit';

/** @type {import('./$types').PageServerLoad} */

/** @type {import('./$types').Actions} */
export const actions = {
    login: async ({
        fetch,
        cookies,
        request
    }) => {
        const formData = Object.fromEntries(await request.formData());
        const {email, password} = formData;

        const loginCheck = async (email, password) => {
            const response = await fetch(
                'http://localhost:8000/api/login_check', {
                    method: 'POST',
                    headers: {
                        Accept: '*/*',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ email: email, password: password })
                }
            );
            const data = await response.json();

            return {
                token: data.token,
                user: data.user
            }
        }

        const {error, token, user} = await loginCheck(email, password);

        if (error) {
            return fail(500, {error});
        }

        setAuthToken({ cookies, token });

        throw redirect(302, "/");
    }
}