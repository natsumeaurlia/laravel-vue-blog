<template>
    <article class="xl:divide-y xl:divide-gray-200 bg-white px-4">
        <header class="pt-6 xl:pb-10">
            <div class="space-y-1 text-center">
                <dl class="space-y-10">
                    <div>
                        <dd class="text-base leading-6 font-medium text-gray-500">
                            <span>{{ date | formatDate }}</span>
                        </dd>
                    </div>
                </dl>
                <div class="mt-2">
                    <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl md:text-5xl md:leading-[3.5rem]">
                        {{ title }}
                    </h1>
                </div>
            </div>
        </header>
        <div class="divide-y xl:divide-y-0 divide-gray-200">
            <div class="markdown-body max-w-none pt-10 pb-8" id="content" v-html="content"/>
        </div>
    </article>
</template>

<script>
import {format} from "@/Utils/dateformat";

export default {
    name: "PostDetail",
    props: ["date", "title", "content", "author"],
    filters: {
        formatDate(val) {
            return format(val);
        }
    }
}
</script>

<style scoped>

</style>
