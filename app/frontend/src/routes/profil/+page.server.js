/** @type {import('./$types').PageServerLoad} */
export async function load({ cookies }) {
	const connectedUser = cookies.get('connectedUser');

	if (connectedUser) {
		return {
			user: JSON.parse(connectedUser)
		};
	}
}