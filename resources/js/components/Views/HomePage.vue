<template>
    <div>
        <Header activePage="Home"/>
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
                    @download="downloadFile($event)"
                />
            </b-tab-item>
            <!--PDF Files End-->

            <!--Html Snippet-->
            <b-tab-item label="HTML snippet">
                <HtmlSnippets
                    :html-snippets="htmlSnippets"
                />
            </b-tab-item>
            <!--Html Snippet End-->

            <!--Link-->
            <b-tab-item label="Link">
                <Links
                    :links="links"
                />
            </b-tab-item>
            <!--Link End-->
        </b-tabs>
    </section>
    </div>
</template>
<script>
import Header from '../Layouts/Header.vue';
import PdfFiles from "../Partials/Home/PdfFiles";
import HtmlSnippets from "../Partials/Home/HtmlSnippets";
import Links from "../Partials/Home/Links";
import PdfFileService from "../../Services/PdfFileService";
import HtmlSnippetService from "../../Services/HtmlSnippetService";
import LinkService from "../../Services/LinkService";

export default {
    name: 'HomePage',
    components: {
        Header,
        PdfFiles,
        HtmlSnippets,
        Links
    },
    data() {
        return {
            pdfFiles: [],
            htmlSnippets: [],
            links: [],
        }
    },
    created() {
        this.getPdfFiles();
        this.getLinks();
        this.getHtmlSnippets();
    },
    methods: {
        getPdfFiles(){
            const loading = this.$buefy.loading.open();
            PdfFileService.index().then(({data}) => this.pdfFiles = data)
            .finally(() => loading.close());
        },
        downloadFile(file){
            const loading = this.$buefy.loading.open();
            PdfFileService.download(file.id).then(({data}) => {
                let blob = new Blob([data], {
                            type: 'application/pdf'
                        })
                let link = document.createElement('a')
                link.href = window.URL.createObjectURL(blob)
                link.download = file.name;
                link.click();
            })
            .catch(error => this.$toast.error(error))
            .finally(() => loading.close());
        },
        getHtmlSnippets(){
            const loading = this.$buefy.loading.open();
            HtmlSnippetService.index().then(({data}) => this.htmlSnippets = data)
            .finally(() => loading.close());
        },
        getLinks(){
            const loading = this.$buefy.loading.open();
            LinkService.index().then(({data}) => this.links = data)
            .finally(() => loading.close());
        },
    }
}
</script>
