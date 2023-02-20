const store = {
    user: {
        token: sessionStorage.getItem("TOKEN"),
        data: {},
    },
    products: {
        loading: false,
        data: {},
        links: [],
        from: null,
        to: null,
        page: 1,
        limit: 10,
        total: null
    },
};

export default store;
