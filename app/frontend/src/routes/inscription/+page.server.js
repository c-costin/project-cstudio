import { fail, redirect } from '@sveltejs/kit';

/** @type {import('./$types').Actions} */
export const actions = {
	create: async ({ request }) => {
		const formData = Object.fromEntries(await request.formData());
		const { email, password, confirmPassword, lastName, firstName, phone } = formData;

		const addUser = async (
			email = '',
			password = '',
			lastName = '',
			firstName = '',
			phone = '',
			address = '',
			roles = 'ROLE_USER'
		) => {
			const response = await fetch('http://localhost:8000/api/user/add', {
				method: 'POST',
				headers: {
					Accepte: '*/*',
					'Content-Type': 'application/json'
				},
				body: JSON.stringify({
					email: email,
					password: password,
					roles: roles,
					lastName: lastName,
					firstName: firstName,
					phone: phone,
					address: address
				})
			});

			if (response.status === 201) {
				return { create: true };
			} else if (response.status === 400) {
				return {
					error: {
						message: 'Requête incorrecte. Veuillez vérifier vos données.',
						code: 400
					}
				};
			} else {
				return {
					error: {
						message: "Une erreur s'est produite lors de la connexion. Veuillez réessayer.",
						code: 500
					}
				};
			}
		};

		if (password != confirmPassword) {
			return fail(422, {
				message: 'mot de passe invalide'
			});
		}

		const { create, error } = await addUser(email, password, lastName, firstName, phone);

		if (error) {
			return fail(error.code, { error });
		} else {
			throw redirect(302, '/connexion');
		}
	}
};
