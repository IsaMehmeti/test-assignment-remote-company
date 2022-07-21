<template>
    <div class="modal-card" style="width: auto">
        <header class="modal-card-head">
            <p class="modal-card-title">Edit Link</p>
        </header>
        <section class="modal-card-body">
            <form>
                <b-field class="mt-5" label="Title" label-position="inside">
                    <b-input v-model="link.title"></b-input>
                </b-field>
                <b-field label="Link" label-position="inside">
                    <b-input v-model="link.link"></b-input>
                </b-field>
                <b-field>
                    <div style="display: flex">
                         Open in new tab
                        <b-checkbox class="ml-1" v-model="link.open_in_new_tab"></b-checkbox>
                    </div>
                </b-field>
            </form>
        </section>
        <footer class="modal-card-foot">
            <button class="button" type="button" @click="$parent.close()"> {{ String('Close') }} </button>
            <button class="button is-primary" @click="$emit('update', link);">{{ String('Save') }}</button>
        </footer>
    </div>
</template>
<script>
export default {
    name: 'LinkEdit',
    props: ['link'],
    data() {
        return {
            file: null,
        }
    },
}
</script>
