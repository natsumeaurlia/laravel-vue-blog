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
        <div class="divide-y xl:divide-y-0 divide-gray-200 xl:grid xl:grid-cols-4 xl:gap-x-6 pb-16 xl:pb-20"
             style="grid-template-rows: auto 1fr;">
            <dl class="pt-6 pb-10 xl:pt-11 xl:border-b xl:border-gray-200">
                <dd>
                    <ul v-if="author" class="flex justify-center xl:block space-x-8 sm:space-x-12 xl:space-x-0 xl:space-y-8">
                        <li class="flex items-center space-x-2">
                            <dl class="text-sm font-medium whitespace-no-wrap">
                                <dd class="text-gray-900">
                                    {{ author }}
                                </dd>
                            </dl>
                        </li>
                    </ul>
                </dd>
            </dl>
            <div class="divide-y divide-gray-200 xl:pb-0 xl:col-span-3 xl:row-span-2">
                <div class="markdown-body max-w-none pt-10 pb-8" id="content" v-html="content"/>
            </div>
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
