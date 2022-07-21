import api from '../api'

export default class HtmlSnippetService {
    static index(){
        return api().get('/html-snippets');
    }
    static store (data) {
        return api().post('/html-snippets', data);
    }
     static update (id, data) {
        return api().post(`/html-snippets/${id}?_method=PATCH`, data);
     }
     static delete (id) {
        return api().delete(`/html-snippets/${id}`);
     }
}
