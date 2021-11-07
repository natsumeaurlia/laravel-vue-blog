<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Post
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <flush-message class="mb-8"/>
                <inertia-link :href="route('admin.post.create')">
                    <primary-badge>
                        新規作成
                    </primary-badge>
                </inertia-link>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-4">
                    <table class="w-full">
                        <thead>
                        <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-300 uppercase border-b border-gray-600">
                            <th class="px-4 py-3" colspan="2">Title</th>
                            <th class="px-4 py-3">Author</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3" colspan="2">Date</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        <tr v-for="(post) in posts.data" class="text-gray-700">
                            <td class="border cursor-pointer p-1 text-center"
                                @click="moveEdit(post.id)">
                                <ficon icon="pen"></ficon>
                            </td>
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
                            <td class="px-4 py-3 text-sm border">{{ post.updated_at | formatDate }}</td>
                            <td class="border cursor-pointer p-1 text-center" @click="showModal(post.id, route('admin.post.destroy', {id:post.id}))">
                                <ficon icon="trash"></ficon>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <pagination class="mt-6" :links="posts.links"/>
                <jet-dialog-modal :show="confirmingDeletion" @close="closeModal">
                    <template #title>
                        Delete Post
                    </template>

                    <template #content>
                        Are you sure you want to delete this post?
                    </template>

                    <template #footer>
                        <jet-secondary-button @click.native="closeModal">
                            Nevermind
                        </jet-secondary-button>

                        <jet-danger-button class="ml-2" @click.native="deletePost">
                            Delete Account
                        </jet-danger-button>
                    </template>
                </jet-dialog-modal>
            </div>
        </div>

    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import PrimaryBadge from "@/Components/PrimaryBadge";
import SecondaryBadge from "@/Components/SecondaryBadge";
import Pagination from "@/Components/Pagination";
import {format} from "@/Utils/dateformat";
import FlushMessage from "@/Components/FlushMessage";
import JetDialogModal from '@/Jetstream/ConfirmationModal'
import JetDangerButton from '@/Jetstream/DangerButton'
import JetSecondaryButton from '@/Jetstream/SecondaryButton'

export default {
    components: {
        FlushMessage,
        Pagination,
        PrimaryBadge,
        SecondaryBadge,
        AppLayout,
        JetDialogModal,
        JetDangerButton,
        JetSecondaryButton
    },
    data() {
        return {
            confirmingDeletion: false,
            postId: '',
            deleteRoute: ''
        }
    },
    props: {
        posts: Object
    },
    methods: {
        moveEdit(id) {
            window.location.href = route('admin.post.edit', {id: id})
        },
        deletePost() {
            this.$inertia.delete(this.deleteRoute, {id: this.postId})
            this.closeModal();
        },
        showModal(id, route) {
            this.confirmingDeletion = true
            this.postId = id;
            this.deleteRoute = route
        },
        closeModal() {
            Object.assign(this.$data, this.$options.data());
        }
    },
    filters: {
        formatDate(val) {
            return format(val, 'YYYY年MM月DD日 HH:mm ss');
        }
    }
}
</script>
