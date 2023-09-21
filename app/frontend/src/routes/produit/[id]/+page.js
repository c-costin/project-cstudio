// @ts-nocheck
import { endpoint } from '$lib/js/request.js';

/** @type {import('./$types').PageLoad} */
export async function load({ fetch, params }) {
	const response = await fetch(`${endpoint}/product/${params.id}`);
	const product = await response.json();

	return {
		product: product
	};
}
