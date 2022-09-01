import axios from "axios";

export default {
    show( id ){
        return axios.get(`/currency_settings/${id}`);
    }
}
