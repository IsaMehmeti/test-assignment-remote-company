<template>
    <div>
        <div class="flex justify-between mb-3">
            <div class="flex justify-end" style="display: flex">
                <b-field label="Links per page" label-position="inside">
                    <b-input min="1" v-model="linksPerPage"></b-input>
                </b-field>
            </div>
        </div>
        <div class="box m-auto mt-2">
        <b-table
            :data="links"
            paginated
            :per-page="linksPerPage"
        >
            <b-table-column field="title" label="Title" v-slot="props">
                {{ props.row.title }}
            </b-table-column>
            <b-table-column field="link" label="Link" v-slot="props">
                <a :target="props.row.open_in_new_tab ? '_blank' : ''" :href="props.row.link"> {{ props.row.link }} </a>
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
    name: "Links",
    props: ['links'],
    data() {
        return {
            linksPerPage: 5
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
