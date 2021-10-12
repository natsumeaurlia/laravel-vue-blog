<template>
    <layout>
        <post-detail :title="post.title" :content="post.content" :date="post.updated_at"/>
    </layout>
</template>

<script>
import Layout from '@/Layouts/GuestLayout';
import PostDetail from "@/Templates/PostDetail";

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
