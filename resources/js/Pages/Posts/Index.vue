<template>
    <layout>
        <div class="py-12 min-h-full">
            <template v-for="(post, index) in posts.data">
                <inertia-link :href="route('post.show', post.id)" :key="index"
                              :class="['block', index % 2 === 0 ? 'my-8' : '']">
                    <PostCard :title="post.title" :content="omitContent(post.html_content)"/>
                </inertia-link>
            </template>
            <pagination class="mt-6" :links="posts.links"/>
        </div>
    </layout>
</template>

<script>
import Layout from '@/Layouts/GuestLayout';
import PostCard from "@/Components/PostCard";
import Pagination from '@/Components/Pagination';

export default {
    components: {
        PostCard,
        Layout,
        Pagination
    },

    props: {
        posts: {
            default: Object
        }
    },
    methods: {
        omitContent(val) {
            const MAX_EXCERPT_LENGTH = 100;
            const regExp = /<[^>]+>/g;
            const text = val.length < MAX_EXCERPT_LENGTH ? val : val.substr(0, MAX_EXCERPT_LENGTH) + '...';
            return text.replace(regExp, '');
        }
    }
}
</script>
