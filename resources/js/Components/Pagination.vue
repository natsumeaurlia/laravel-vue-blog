<template>
    <div v-if="links.length > 3" class="flex">
        <template v-for="(link, i) in links">
            <div v-if="link.url === null"
                 class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded bg-white"
                 v-html="link.label"/>
            <inertia-link v-else
                          class="bg-white mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-gray-200 focus:border-indigo-500 focus:text-indigo-500"
                          :class="{ 'bg-blue-700 hover:bg-blue-700 text-white': link.active }" :href="link.url"
                          v-html="link.label"/>

        </template>
    </div>
</template>

<script>
export default {
    props: {
        links: Array
    },
}

</script>
