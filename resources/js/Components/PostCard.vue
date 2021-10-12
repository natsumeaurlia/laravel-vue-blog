<template>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 sm:px-20 border-b border-gray-200 h-56 overflow-hidden">
            <div class="mt-6 text-2xl">
                {{ title }}
            </div>

            <div class="mt-4 text-base text-gray-500">
                {{ content }}
            </div>
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
