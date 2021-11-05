<template>
    <div v-if="this.$page.props.flash">
        <template v-if="this.$page.props.flash.success">
            <notification-banner type="success">
                {{ this.$page.props.flash.success }}
            </notification-banner>
        </template>
        <template v-else-if="this.$page.props.flash.faild">
            <notification-banner type="warning">
                {{ this.$page.props.flash.faild }}
            </notification-banner>
        </template>
        <template v-else-if="this.$page.props.flash.message">
            <notification-banner type="info">
                {{ this.$page.props.flash.message }}
            </notification-banner>
        </template>
    </div>
</template>

<script>
import NotificationBanner from "@/Components/NotificationBanner";

export default {
    name: "FlushMessage",
    components: {NotificationBanner},
}
</script>

<style scoped>

</style>
