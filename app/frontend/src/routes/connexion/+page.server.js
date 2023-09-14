import {
    setAuthToken, setUser
} from '$lib/utils';
import {
    fail,
    redirect
} from '@sveltejs/kit';

/** @type {import('./$types').Actions} */
export const actions = {
    login: async ({
        fetch,
        cookies,
        request
    }) => {
        const formData = Object.fromEntries(await request.formData());
        const {
            email,
            password
        } = formData;

        const loginCheck = async (email, password) => {
            const response = await fetch(
                'http://localhost:8000/api/login_check', {
                    method: 'POST',
                    headers: {
                        Accept: '*/*',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        email: email,
                        password: password
                    })
                }
            );

            if (response.status === 200) {
                const data = await response.json();

                return {
                    token: data.token,
                    user: data.user
                }
            } else if (response.status === 401) {
                return {error:
                {
                    message: 'Requête incorrecte. Veuillez vérifier vos données.',
                    code : 401
                }}
            } else {
                return {error:
                {
                    message: 'Une erreur s\'est produite lors de la connexion. Veuillez réessayer.',
                    code :500 
                }}
            }
        }

        const {
            error,
            token,
            user
        } = await loginCheck(email, password);

        if (error) {
            console.log({error});
            return fail(error.code, {error});
          } else {
            setAuthToken({
                cookies,
                token
            });
            setUser({
                cookies,
                user
            });
    
            throw redirect(303, "/");
          }
    }
}