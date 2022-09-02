import axios from "axios";

export default {
    store( data ){
        return axios.post(`/orders`, data);
    }
}
