<template>
    <div>
        <div class="flex justify-between mb-3">
            <b-field label="Files per page" label-position="inside">
                <b-input min="1" v-model="pdfFilesPerPage"></b-input>
            </b-field>
        </div>
        <div class="box m-auto mt-2">
        <b-table
            :data="pdfFiles"
            paginated
            :per-page="pdfFilesPerPage"

        >
            <b-table-column field="title" label="Title" v-slot="props">
                {{ props.row.title }}
            </b-table-column>
            <b-table-column field="file_name" label="File Name" v-slot="props">
                <a @click="$emit('download', props.row)">
                    {{ props.row.name }}
                </a>
            </b-table-column>
            <b-table-column field="size" label="File Size" v-slot="props">
                 {{ (props.row.size / 1024 / 1024).toFixed(1) }} MB
            </b-table-column>
            <b-table-column label="Actions" v-slot="props">
                <b-button
                    icon-right="download"
                    @click="$emit('download', props.row)">
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
export default{
    name: "PdfFiles",
    props: ['pdfFiles'],
    data() {
        return {
            pdfFilesPerPage: 5
        };
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
