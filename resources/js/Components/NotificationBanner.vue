<template>
    <div :class="[color,'border-t border-b px-4 py-3']" role="alert">
        <p class="font-bold">
            <slot name="title"/>
        </p>
        <p class="text-sm">
            <slot/>
        </p>
    </div>
</template>

<script>
const NOTIFICATION_TYPE = {
    info: 'info',
    success: 'success',
    warning: 'warning',
    danger: 'danger',
}

export default {
    name: "NotificationBanner",
    props: {
        type: {
            validator: (value) => {
                // プロパティの値は、必ずいずれかの文字列でなければならない
                return Object.values(NOTIFICATION_TYPE).indexOf(value) !== -1
            },
            default: NOTIFICATION_TYPE.info
        }
    },
    computed: {
        color() {
            if (this.type === NOTIFICATION_TYPE.info) {
                return 'bg-blue-100 border-blue-500 text-blue-700';
            }
            if (this.type === NOTIFICATION_TYPE.success) {
                return 'bg-green-100 border-green-500 text-green-700';
            }
            if (this.type === NOTIFICATION_TYPE.warning) {
                return 'bg-orange-100 border-orange-500 text-orange-700';
            }
            return 'bg-red-100 border-red-500 text-red-700';
        }
    }


}
</script>

<style scoped>

</style>
