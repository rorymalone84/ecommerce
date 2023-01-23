import axios from "axios";
import store from "./store";
import router from "./router";

const axiosClient = axios.create({
    //laravel url
    baseURL: `${import.meta.env.VITE_API_BASE_URL}/api`,
});

axiosClient.interceptors.request.use((config) => {
    config.headers.Authorization = `Bearer ${store.state.user.token}`;
    return config;
});

axiosClient.interceptors.response.use(
    //successful authentication response
    (response) => {
        return response;
    },
    (error) => {
        //remove token and session storage if unauthorized, and return user to login page
        if (error.response.status === 401) {
            sessionStorage.removeItem("TOKEN");
            router.push({ name: "login" });
        }

        throw error;
    }
);

export default axiosClient;
