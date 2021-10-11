<template>
    <layout>
        <div class="py-12" v-html="post.content" />
    </layout>
</template>

<script>
import Layout from '@/Layouts/GuestLayout'
import PostCard from "@/Components/PostCard";

export default {
    components: {
        PostCard,
        Layout,
    },

    props: {
        post: {
            default: Object
        }
    }
}
</script>
