import api from '../api'

export default class LinkService {
    static index(){
        return api().get('/links');
    }
    static store (data) {
        return api().post('/links', data);
    }
     static update (id, data) {
        return api().post(`/links/${id}?_method=PATCH`, data);
     }
     static delete (id) {
        return api().delete(`/links/${id}`);
     }
}
