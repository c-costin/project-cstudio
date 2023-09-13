/** @type {import('./$types').PageLoad} */
export async function load({ fetch, params }) {
        const response = await fetch(`http://localhost:8000/api/product/${params.id}`)
        const data = await response.json();

        return data;
    }