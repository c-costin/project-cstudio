// import {
//     createUser
// } from "$lib/user";
import {
    setAuthToken,
    setUser
} from "$lib/utils";
import {
    fail,
    redirect
} from "@sveltejs/kit";

/** @type {import('./$types').Actions} */
export const actions = {
    create: async ({
        cookies,
        request
    }) => {
        const formData = Object.fromEntries(await request.formData());
        const {
            lastname,
            firstname,
            email,
            phone,
            password
        } = formData;

        // if (!lastname || !firstname || !email || !phone || !password) {
        //     const error = {
        //         message: 'Veuillez remplir tous les champs du formulaire.',
        //         code: 400
        //     };
        //     return fail(error.code, {
        //         error
        //     });
        // }

        const addUser = async (lastname, firstname, email, phone, password) => {
            const response = await fetch(
                'http://localhost:8000/api/user/add', {
                    method: 'POST',
                    headers: {
                        Accept: '*/*',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        lastname: lastname,
                        firstname: firstname,
                        email: email,
                        phone: phone,
                        password: password
                    })
                }
            );

            if (response.status === 200) {
                const data = await response.json();

                return {
                    token: data.token,
                    user: data.user
                };
            } else if (response.status === 401) {
                return {
                    error: {
                        message: 'Requête incorrecte. Veuillez vérifier vos données.',
                        code: 401
                    }
                };
            } else {
                return {
                    error: {
                        message: 'Une erreur s\'est produite lors de la connexion. Veuillez réessayer.',
                        code: 500
                    }
                };
            }
        }

        const {
            error,
            token,
            user
        } = await addUser(lastname, firstname, email, phone, password);

        if (error) {
            console.log({
                error
            });
            return fail(error.code, {
                error
            });
        } else {
            setAuthToken({
                cookies,
                token
            });
            setUser({
                cookies,
                user
            });

            throw redirect(302, "/connexion");
        }
    }
}
