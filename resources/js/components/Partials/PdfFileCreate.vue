<template>
    <div class="modal-card" style="width: auto">
        <header class="modal-card-head">
            <p class="modal-card-title">Create Pdf File</p>
        </header>
        <section class="modal-card-body">
            <form>
                <b-field class="mt-5" label="title" label-position="inside">
                    <b-input v-model="pdfFile.title"></b-input>
                </b-field>
                <b-field class="file is-primary" :class="{'has-name': !!file}">
                    <b-upload v-model="file" class="file-label">
                        <span class="file-cta">
                            <b-icon class="file-icon" icon="upload"></b-icon>
                            <span class="file-label">Click to upload</span>
                        </span>
                        <span class="file-name" v-if="file">
                            {{ file.name }}
                        </span>
                    </b-upload>
                </b-field>
            </form>

        </section>
        <footer class="modal-card-foot">
            <button class="button" type="button" @click="$parent.close()"> {{ String('Close') }} </button>
            <button class="button is-primary" @click="createFile">{{ String('Create') }}</button>
        </footer>
    </div>
</template>
<script>
export default {
    name: 'PdfFileCreate',
    data() {
        return {
            pdfFile: {},
            file: null,
        }
    },
    methods: {
      createFile(){
          this.pdfFile.file = this.file;
          this.$emit('created', this.pdfFile)
      }
    }
}
</script>
