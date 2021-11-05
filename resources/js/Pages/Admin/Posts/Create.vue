<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                New Post
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
                        <label for="postContent" class="block">Content</label>
                        <div class="flex justify-between">
                            <textarea v-model="form.content" id="postContent"
                                      class="w-1/2 bg-white border-gray-300 rounded p-2"
                                      rows="10"></textarea>
                            <div class="markdown-body w-1/2 bg-white ml-4 border-gray-300 border rounded p-2"
                                 v-html="compiledMarkdown"/>
                        </div>
                        <div v-if="errors.content" class="text-red-700 font-semibold">{{ errors.content }}</div>
                    </div>
                    <div class="flex flex-col mt-4">
                        <label for="published">Type</label>
                        <select v-model="form.published" id="published" class="bg-white border-gray-300 rounded p-2 w-1/5">
                            <option value="1">Publish</option>
                            <option value="0">Private</option>
                        </select>
                        <div v-if="errors.published" class="text-red-700 font-semibold">{{ errors.published }}</div>
                    </div>
                    <div class="mt-4">
                        <button @click="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                type="button">投稿する
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import PrimaryBadge from "@/Components/PrimaryBadge";
import SecondaryBadge from "@/Components/SecondaryBadge";
import {format} from "@/Utils/dateformat";
import {marked} from 'marked';

export default {
    components: {
        PrimaryBadge,
        SecondaryBadge,
        AppLayout,
    },
    data() {
        return {
            form: {
                content: '',
                title: '',
                published: "1"
            }
        }
    },
    props: {
        posts: Object,
        errors: Object,
    },
    methods: {
        submit() {
            this.$inertia.post(route('admin.post.store'), this.form)
        },
    },
    computed: {
        compiledMarkdown() {
            return marked(this.form.content);
        },
    },
    filters: {
        formatDate(val) {
            return format(val);
        }
    }
}
</script>
<style scoped lang="scss">

</style>
