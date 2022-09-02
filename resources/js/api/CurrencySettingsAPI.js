import axios from "axios";

export default {
    show( id ){
        return axios.get(`/currency_settings/${id}`);
    },

    update( id, params ){
        return axios.put(`/currency_settings/${id}`, params);
    }
}
