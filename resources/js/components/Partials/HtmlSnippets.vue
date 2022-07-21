<template>
    <div>
        <div class="flex justify-between mb-3">
            <b-button @click="$emit('created')"
                     type="is-primary"
                     icon-right="plus"
            >Create</b-button>
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
    name: "HtmlSnippets",
    props: ['htmlSnippets'],
    data() {
        return {
            htmlSnippetsPerPage: 5
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
