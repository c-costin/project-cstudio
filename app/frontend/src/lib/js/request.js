const endpoint = "http://localhost:8000/api";

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

export const findProductsByCategory = async (e) => {
    const categoryId = e.target.value;
    const response = await fetch(`${endpoint}/product/?category=${categoryId}`, {
        method: 'GET',
        headers: {
            Accept: '*/*',
            'Content-Type': 'application/json'
        }
    });
    const data = await response.json();
    return data.slice(0, 10);
};