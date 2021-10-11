<template>
    <layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Posts
            </h2>
        </template>

        <div class="py-12">
            <div v-for="(post, index) in posts.data" :class="['bg-white overflow-hidden shadow-xl sm:rounded-lg', index % 2 == 0 ? 'my-8' : '']">
                <PostCard :title="post.title" :content="post.content"/>
            </div>
        </div>
    </layout>
</template>

<script>
import Layout from '@/Layouts/GuestLayout'
import Welcome from '@/Components/Welcome'
import PostCard from "@/Components/PostCard";

export default {
    components: {
        PostCard,
        Layout,
        Welcome,
    },

    props: {
        posts: {
            default: Object
        }
    }
}
</script>
