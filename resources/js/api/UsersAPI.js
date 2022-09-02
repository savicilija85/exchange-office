import axios from "axios";

export default {
    show( id ){
        return axios.get(`/users/${id}`);
    },

    update( id, params ){
        return axios.put(`/users/${id}`, params);
    }
}
