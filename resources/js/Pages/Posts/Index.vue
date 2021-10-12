<template>
    <layout>
        <div class="py-12">
            <template v-for="(post, index) in posts.data">
                <inertia-link :href="route('post.show', post.id)" :key="index"
                              :class="['block bg-white overflow-hidden shadow-sm sm:rounded-lg', index % 2 == 0 ? 'my-8' : '']">
                    <PostCard :title="post.title" :content="post.content"/>
                </inertia-link>
            </template>
        </div>
    </layout>
</template>

<script>
import Layout from '@/Layouts/GuestLayout';
import PostCard from "@/Components/PostCard";

export default {
    components: {
        PostCard,
        Layout,
    },

    props: {
        posts: {
            default: Object
        }
    }
}
</script>
