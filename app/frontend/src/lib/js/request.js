// @ts-nocheck
export const endpoint = 'http://localhost:8000/api';

export const findAllProducts = async () => {
	const response = await fetch(`${endpoint}/product/`, {
		method: 'GET',
		headers: {
			Accept: '*/*',
			'Content-Type': 'application/json'
		}
	});
	const data = await response.json();

	return data;
};

export const findAllProductById = async (id) => {
	const response = await fetch(`${endpoint}/product/${id}`, {
		method: 'GET',
		headers: {
			Accept: '*/*',
			'Content-Type': 'application/json'
		}
	});
	const data = await response.json();

	return data;
}

export const findProductsByType = async (e) => {
	const typeId = e.target.value;
	const response = await fetch(`${endpoint}/product/?type=${typeId}`, {
		method: 'GET',
		headers: {
			Accept: '*/*',
			'Content-Type': 'application/json'
		}
	});
	const data = await response.json();
	return data.slice(0, 10);
};

export const findProductsByCategoryId = async (id) => {
	const response = await fetch(`${endpoint}/product/?category=${id}`, {
		method: 'GET',
		headers: {
			Accept: '*/*',
			'Content-Type': 'application/json'
		}
	});
	const data = await response.json();
	return data.slice(0, 10);
};

export const findAllTypes = async () => {
	const response = await fetch(`${endpoint}/type/`, {
		method: 'GET',
		headers: {
			Accept: '*/*',
			'Content-Type': 'application/json'
		}
	});
	const data = await response.json();

	return data;
};

export const findAllCategories = async () => {
	const response = await fetch(`${endpoint}/category/`, {
		method: 'GET',
		headers: {
			Accept: '*/*',
			'Content-Type': 'application/json'
		}
	});
	const data = await response.json();

	return data;
};

export const findAllOrders = async (token) => {
	const response = await fetch(`${endpoint}/order/`, {
		method: 'GET',
		headers: {
			Accept: '*/*',
			'Content-Type': 'application/json',
			'Authorization': `Bearer ${token}`,
		}
	});
	const data = await response.json();

	return data;
};

export const findOrdersByUserId = async (id, token) => {
	const response = await fetch(`${endpoint}/order/?user=${id}`, {
		method: 'GET',
		headers: {
			Accept: '*/*',
			'Content-Type': 'application/json',
			'Authorization': `Bearer ${token}`,
		}
	});
	const data = await response.json();
	return data;
};

export const findAllLikeByUserId = async (id, token) => {
	const response = await fetch(`${endpoint}/like/?user=${id}`, {
		method: 'GET',
		headers: {
			Accept: '*/*',
			'Content-Type': 'application/json',
			'Authorization': `Bearer ${token}`,
		}
	});
	const data = await response.json();
	return data;
};


export const addUserLike = async (productId, userId, token) => {
	const response = await fetch(`${endpoint}/like/add?product=${productId}&user=${userId}`, {
		method: 'POST',
		headers: {
			Accept: '*/*',
			'Content-Type': 'application/json',
			'Authorization': `Bearer ${token}`,
		}
	});
	const data = await response.json();
	return data;
};

export const removeUserLike = async (productId, userId, token) => {
	const response = await fetch(`${endpoint}/like/delete?product=${productId}&user=${userId}`, {
		method: 'DELETE',
		headers: {
			Accept: '*/*',
			'Content-Type': 'application/json',
			'Authorization': `Bearer ${token}`,
		}
	});
	const data = await response.json();
	return data;
};