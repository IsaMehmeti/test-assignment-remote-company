<template>
    <div class="modal-card" style="width: auto">
        <header class="modal-card-head">
            <p class="modal-card-title">Create Html Snippet</p>
        </header>
        <section class="modal-card-body">
            <form>
                <b-field class="mt-5" label="Title">
                    <b-input v-model="htmlSnippet.title"></b-input>
                </b-field>
                <b-field label="Description" horizontal>
                    <b-input type="textarea" v-model="htmlSnippet.description"></b-input>
                </b-field>
                <b-field label="Snippet" horizontal>
                    <b-input type="textarea" v-model="htmlSnippet.snippet"></b-input>
                </b-field>
            </form>

        </section>
        <footer class="modal-card-foot">
            <button class="button" type="button" @click="$parent.close()"> {{ String('Close') }} </button>
            <button class="button is-primary" @click="$emit('created', htmlSnippet)">{{ String('Create') }}</button>
        </footer>
    </div>
</template>
<script>
export default {
    name: 'HtmlSnippetCreate',
    data() {
        return {
            htmlSnippet: {},
        }
    },
}
</script>
