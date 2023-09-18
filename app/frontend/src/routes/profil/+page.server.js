/** @type {import('./$types').PageServerLoad} */
export async function load({ cookies }) {
	const token = cookies.get('AuthorizationToken');
	const connectedUser = cookies.get('ConnectedUser');

	return {
		user: JSON.parse(connectedUser)
	};
}