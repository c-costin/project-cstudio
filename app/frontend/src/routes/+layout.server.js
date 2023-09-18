/** @type {import('./$types').LayoutServerLoad} */
export async function load({ cookies }) {
	const token = cookies.get('AuthorizationToken');
	const connectedUser = cookies.get('ConnectedUser');

	if (connectedUser) {
		return {
			user: JSON.parse(connectedUser)
		};
	}
}