<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Post
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="form-wrapper">
                    <div class="flex flex-col">
                        <label for="title">Title</label>
                        <input v-model="form.title" id="title" type="text"
                               class="w-1/2 bg-white border-gray-300 rounded p-2">
                        <div v-if="errors.title" class="text-red-700 font-semibold">{{ errors.title }}</div>
                    </div>
                    <div class="mt-8">
                        <markdown-editor label="Content" :content.sync="form.content"/>
                        <div v-if="errors.content" class="text-red-700 font-semibold">{{ errors.content }}</div>
                    </div>
                    <div class="flex flex-col mt-4">
                        <label for="published">Type</label>
                        <select v-model="form.published" id="published"
                                class="bg-white border-gray-300 rounded p-2 w-1/5">
                            <option value="1">Publish</option>
                            <option value="0">Private</option>
                        </select>
                        <div v-if="errors.published" class="text-red-700 font-semibold">{{ errors.published }}</div>
                    </div>
                    <div class="mt-4">
                        <button @click="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                type="button">編集する
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import MarkdownEditor from "@/Components/MarkdownEditor";

export default {
    components: {
        MarkdownEditor,
        AppLayout,
    },
    data() {
        return {
            form: {
                title: this.post.title,
                content: this.post.content,
                published: this.post.published
            }
        }
    },
    props: {
        errors: Object,
        post: Object
    },
    methods: {
        submit() {
            this.$inertia.put(route('admin.post.update', {id: this.post.id}), this.form);
        },
    },
}
</script>
<style scoped lang="scss">

</style>
