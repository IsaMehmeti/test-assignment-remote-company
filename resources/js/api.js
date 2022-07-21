import axios from 'axios';

export default() => {
    return axios.create({
        baseURL: `${window.location.origin}/api`
    });
}
