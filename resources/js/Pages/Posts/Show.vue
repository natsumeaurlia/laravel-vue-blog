<template>
    <layout>
        <post-detail class="mt-8" :title="post.title" :content="post.content" :date="post.updated_at"/>
    </layout>
</template>

<script>
import Layout from '@/Layouts/GuestLayout';
import PostDetail from "@/Components/PostDetail";

export default {
    components: {
        Layout,
        PostDetail
    },

    props: {
        post: {
            default: () => {
                return {
                    title: '',
                    content: '',
                    updated_at: ''
                }
            }
        }
    }
}
</script>
