<template>
    <div>
        <!--Modals-->
        <b-modal :active.sync="pdfFileEditOpen" v-if="pdfFile">
            <PdfFileEdit :pdf-file="pdfFile" @update="updatePdfFile"></PdfFileEdit>
        </b-modal>
        <b-modal :active.sync="pdfFileCreateOpen">
            <PdfFileCreate @created="storePdfFile($event)"></PdfFileCreate>
        </b-modal>
        <!--Modals-->

        <Header activePage="Admin" />
        <section class="container mt-4">
        <div class="block">
          <h1 class="title">
            Resources
          </h1>
        </div>
        <b-tabs >
            <!--PDF Files-->
            <b-tab-item label="PDF download">
                <PdfFiles
                    :pdf-files="pdfFiles"
                    @deleted="deletePdfFile($event)"
                    @edited="editPdfFile($event)"
                    @created="pdfFileCreateOpen = true"
                />
            </b-tab-item>
            <!--PDF Files End-->

            <!--Html Snippet-->
            <b-tab-item label="HTML snippet">
            </b-tab-item>
            <!--Html Snippet End-->

            <!--Link-->
            <b-tab-item label="Link">
            </b-tab-item>
            <!--Link End-->
        </b-tabs>
    </section>
    </div>
</template>
<script>
import Header from '../Layouts/Header.vue';
import PdfFileService from "../../Services/PdfFileService";
import PdfFiles from "../Partials/PdfFiles";
import PdfFileEdit from "../Partials/PdfFileEdit";
import PdfFileCreate from "../Partials/PdfFileCreate";

export default {
    name: 'AdminPage',
     components: {
         Header,
         PdfFiles,
         PdfFileEdit,
         PdfFileCreate
    },
    data(){
        return {
           pdfFilesPerPage: 5,
           pdfFiles: [],
           isLoading: true,
           pdfFileEditOpen: false,
           pdfFileCreateOpen: false,
           pdfFile: null,
        }
    },
    created() {
        this.getPdfFiles();
    },
    methods: {
        getPdfFiles(){
            const loading = this.$buefy.loading.open();
            PdfFileService.index().then(({data}) => this.pdfFiles = data)
            .finally(() => loading.close());
        },
        storePdfFile(data){
            const loading = this.$buefy.loading.open();
            let formData = this.makeFileFormData(data);
            if (!formData){
                loading.close();
                this.pdfFileCreateOpen = false;
                return this.$toast.error('File is too Large. Max File Size: 2MB');
            }
            return PdfFileService.store(formData)
                .then(({data}) => this.$toast.message(data.message))
                .catch(error => this.$toast.error(error))
                .finally(() => {
                    loading.close();
                    this.pdfFileCreateOpen = false;
                    this.getPdfFiles();
                });
        },
        editPdfFile(data){
           this.pdfFile = data;
           this.pdfFileEditOpen = true;
        },
        updatePdfFile(data){
            const loading = this.$buefy.loading.open();
            let formData = this.makeFileFormData(data);
            if (!formData){
                loading.close();
                this.pdfFileEditOpen = false;
                return this.$toast.error('File is too Large. Max File Size: 2MB');
            }
            return PdfFileService.update(data.id, formData)
                .then(({data}) => this.$toast.message(data.message))
                .catch(error => this.$toast.error(error))
                .finally(() => {
                    loading.close();
                    this.pdfFileEditOpen = false;
                    this.getPdfFiles();
                });
        },
        deletePdfFile(id){
            const loading = this.$buefy.loading.open();
            return PdfFileService.delete(id)
                .then(({data}) => this.$toast.message(data.message))
                .catch(error => this.$toast.error(error))
                .finally(() => this.getPdfFiles() || loading.close());
        },
        makeFileFormData(data){
            let formData = new FormData;
            if (data.file){
                formData.append('file', data.file, data.file.name)
                if ((data.file.size  / 1024 / 1024) > 2) return false;
            }
            if(data.title)formData.append('title', data.title);

            return formData;
        }
    }
}
</script>
