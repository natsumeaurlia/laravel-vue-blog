<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Post
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <table class="w-full">
                        <thead>
                        <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-300 uppercase border-b border-gray-600">
                            <th class="px-4 py-3">Title</th>
                            <th class="px-4 py-3">Author</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Date</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        <tr v-for="(post, index) in posts.data" class="text-gray-700">
                            <td class="px-4 py-3 border">
                                <div class="flex items-center text-sm">
                                    {{ post.title }}
                                </div>
                            </td>
                            <td class="px-4 py-3 text-ms font-semibold border">{{ post.user.name }}</td>
                            <td class="px-4 py-3 text-xs border">
                                <template v-if="post.published">
                                    <primary-badge>Published</primary-badge>
                                </template>
                                <template v-if="!post.published">
                                    <secondary-badge>Private</secondary-badge>
                                </template>
                            </td>
                            <td class="px-4 py-3 text-sm border">{{ post.updated_at }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <pagination class="mt-6" :links="posts.links"/>
            </div>
        </div>

    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import PrimaryBadge from "@/Components/PrimaryBadge";
import SecondaryBadge from "@/Components/SecondaryBadge";
import Pagination from "@/Components/Pagination";

export default {
    components: {
        Pagination,
        PrimaryBadge,
        SecondaryBadge,
        AppLayout,
    },
    props: {
        posts: Object
    }
}
</script>
