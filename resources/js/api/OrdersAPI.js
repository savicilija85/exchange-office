import axios from "axios";

export default {
    index( options ) {
         return axios.get('/orders', {params: options});
    },

    store( data ){
        return axios.post(`/orders`, data);
    }
}
