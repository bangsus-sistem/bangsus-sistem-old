<template>
    <div v-if="state.widget.show">
        <bsb-card>
            <bsb-card-body>
                <div class="text-center" v-if="loading">
                    <bsb-spinner/>
                </div>
                <div v-else>
                    <h5 class="card-title">{{ title }}</h5>
                    <slot/>
                </div>
            </bsb-card-body>
        </bsb-card>
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
        loading: {
            type: Boolean,
            default: false,
        },
        title: {
            type: String,
            required: true,
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