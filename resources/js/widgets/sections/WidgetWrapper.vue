<template>
    <div v-if="state.widget.show">
        <slot/>
    </div>
</template>

<script>
export default {
    props: {
        moduleRef: {
            required: true,
            type: String,
        },
        widgetTypeRef: {
            required: true,
            type: String,
        },
    },
    data() {
        return {
            state: {
                widget: {
                    show: false,
                }
            }
        }
    },
    created() {
        const moduleRef = this.moduleRef
        const widgetTypeRef = this.widgetTypeRef
        const widgetAuth = this.$store.getters['utils/auth/widgets']
        const widget = lodash.find(widgetAuth, (widget) => {
            return widget['module']['ref'] == moduleRef && widget['widget_type']['ref'] == widgetTypeRef
        })

        this.state.widget.show = widget != undefined
    }
}
</script>