<template>
    <div>
        <label for="marked" class="block">{{ label }}</label>
        <div class="flex justify-between">
        <textarea @input="onInput" id="marked"
                  class="w-1/2 bg-white border-gray-300 rounded p-2"
                  rows="10"></textarea>
            <div class="markdown-body w-1/2 bg-white ml-4 border-gray-300 border rounded p-2"
                 v-html="compiledMarkdown"/>
        </div>
    </div>
</template>

<script>
import {marked} from "marked";

export default {
    name: "MarkdownEditor",
    props: ['content', 'label'],
    methods: {
        onInput: function (e) {
            this.$emit('update:content', e.target.value)
        }
    },
    computed: {
        compiledMarkdown() {
            return marked(this.content);
        },
    },
}
</script>

<style scoped>

</style>
