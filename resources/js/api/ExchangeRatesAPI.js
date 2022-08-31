import axios from "axios";

export default {
    show( id ){
        return axios.get(`/exchange_rates/${id}`);
    }
}
