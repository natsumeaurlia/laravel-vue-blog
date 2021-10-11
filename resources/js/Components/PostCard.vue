<template>
    <div class="p-6 sm:px-20 border-b border-gray-200 h-56 overflow-hidden">
        <div class="mt-8 text-2xl">
            <slot name="title">
                {{ title }}
            </slot>
        </div>

        <div class="mt-6 text-gray-500">
            <slot name="content">
                {{ content }}
            </slot>
        </div>
    </div>
</template>

<script>
export default {
    name: "PostCard",
    props: ["title", "content"]
}
</script>

<style scoped>

</style>
