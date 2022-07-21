<template>
    <div class="modal-card" style="width: auto">
        <header class="modal-card-head">
            <p class="modal-card-title"> View Snippet- {{htmlSnippet.title}}</p>
        </header>
        <section class="modal-card-body">
            <div class="mt-auto">
               <h2 class="subtitle">Description: {{htmlSnippet.description}}</h2>
                <div class="box">
                    <div v-if="switched"> {{ htmlSnippet.snippet }} </div>
                    <td v-else v-html="htmlSnippet.snippet"></td>
                </div>

            </div>
        </section>
        <footer class="modal-card-foot">
            <button class="button" type="button" @click="$parent.close()"> {{ String('Close') }} </button>
            <button class="button is-primary" @click="$emit('copied', htmlSnippet)">{{ String('Copy Snippet') }}</button>
            <button class="button is-primary" @click="switched = !switched">{{ String('Switch') }}</button>
        </footer>
    </div>
</template>
<script>
export default {
    name: 'HtmlSnippetEdit',
    props: ['htmlSnippet'],
    data() {
        return {
            switched: false
        }
    }
}
</script>
