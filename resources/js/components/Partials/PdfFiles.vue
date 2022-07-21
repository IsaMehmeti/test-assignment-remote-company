<template>
    <div>
        <div class="flex justify-between mb-3">
            <b-button @click="$emit('created')"
                     type="is-primary"
                     icon-right="plus"
            >Create</b-button>
            <div class="flex justify-end" style="display: flex">
                <b-field label="Files per page" label-position="inside">
                    <b-input min="1" v-model="pdfFilesPerPage"></b-input>
                </b-field>
            </div>
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
                {{ props.row.name }}
            </b-table-column>
            <b-table-column field="size" label="File Size" v-slot="props">
                {{ props.row.size }}
            </b-table-column>
            <b-table-column label="Actions" v-slot="props">
                <b-button
                    icon-right="pencil"
                    @click="$emit('edited', props.row)">
                </b-button>
                <b-button
                    type="is-danger"
                    icon-right="delete"
                    @click="$emit('deleted', props.row.id)"
                />
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
