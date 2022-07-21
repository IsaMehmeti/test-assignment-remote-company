import api from '../api'

export default class PdfFileService {
    static index(){
        return api().get('/pdf-files');
    }
    static store (data) {
        return api().post('/pdf-files', data);
    }
     static update (id, data) {
        return api().post(`/pdf-files/${id}?_method=PATCH`, data);
     }
     static delete (id) {
        return api().delete(`/pdf-files/${id}`);
     }
}
