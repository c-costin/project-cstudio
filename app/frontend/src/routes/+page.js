/** @type {import('./$types').PageLoad} */
export async function load({ fetch }) {
    const findAllProducts = async () => {
        const response = await fetch(
            "http://localhost:8000/api/product/",
            {
                method: "GET",
                headers: {
                    "Accept": "*/*",
                    "Content-Type": "application/json",
                }
            }
        )
        const data = await response.json();

        return data;
    }

    const findAllTypes = async () => {
        const response = await fetch(
            "http://localhost:8000/api/type/",
            {
                method: "GET",
                headers: {
                    "Accept": "*/*",
                    "Content-Type": "application/json",
                }
            }
        )
        const data = await response.json();

        return data;
    }

    const findAllCategories = async () => {
        const response = await fetch(
            "http://localhost:8000/api/category/",
            {
                method: "GET",
                headers: {
                    "Accept": "*/*",
                    "Content-Type": "application/json",
                }
            }
        )
        const data = await response.json();

        return data;
    }

    return { 
        products: findAllProducts(),
        types: findAllTypes(),
        categories: findAllCategories()
    };
}