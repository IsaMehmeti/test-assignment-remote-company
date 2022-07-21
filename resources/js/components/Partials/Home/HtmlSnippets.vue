<template>
    <div>
        <b-modal :active.sync="modalOpen" v-if="htmlSnippet">
            <ViewHtmlSnippet :html-snippet="htmlSnippet" @copied="copyHtmlCode"></ViewHtmlSnippet>
        </b-modal>
        <div class="flex justify-between mb-3">
            <div class="flex justify-end" style="display: flex">
                <b-field label="Snippets per page" label-position="inside">
                    <b-input min="1" v-model="htmlSnippetsPerPage"></b-input>
                </b-field>
            </div>
        </div>
        <div class="box m-auto mt-2">
        <b-table
            :data="htmlSnippets"
            paginated
            :per-page="htmlSnippetsPerPage"
        >
            <b-table-column field="title" label="Title" v-slot="props">
                {{ props.row.title }}
            </b-table-column>
            <b-table-column field="title" label="Description" v-slot="props">
                <div v-if="props.row.description">
                    <div v-if="props.row.description.length < 8">{{ props.row.description }}</div>
                    <div v-else>{{ props.row.description.substring(0,8)+".." }}</div>
                </div>

            </b-table-column>
            <b-table-column label="Actions" v-slot="props">
                <b-button
                    icon-right="eye-outline"
                    @click="modalOpen = true; htmlSnippet = props.row">
                </b-button>
            </b-table-column>
            <template #empty>
                <div class="has-text-centered">No Data</div>
            </template>
        </b-table>
        </div>
    </div>
</template>
<script>
import ViewHtmlSnippet from './ViewHtmlSnippet';
export default{
    name: "HtmlSnippets",
    props: ['htmlSnippets'],
    components: {
        ViewHtmlSnippet
    },
    data() {
        return {
            htmlSnippetsPerPage: 5,
            htmlSnippet: null,
            modalOpen: false,

        };
    },
    methods: {
        copyHtmlCode(htmlSnippet) {
            const tmpTextField = document.createElement("textarea")
            tmpTextField.textContent = htmlSnippet.snippet;
            tmpTextField.setAttribute("style","position:absolute; right:200%;")
            document.body.appendChild(tmpTextField)
            tmpTextField.select()
            tmpTextField.setSelectionRange(0, 99999) /*For mobile devices*/
            document.execCommand("copy")
            tmpTextField.remove();
            this.$toast.message('Copied');
        },
    }
}
</script>
<style>
.flex{
    display: flex;
}
.justify-between{
     justify-content:space-between;
}
</style>
