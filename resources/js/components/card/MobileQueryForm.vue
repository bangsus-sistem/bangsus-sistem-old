<template>
    <div>
        <bsb-col class="text-center">
            <a href="#" @click.prevent="toggleShow">
                Cari Sesuatu <bsb-icon :icon="icon" color="primary" />
            </a>
        </bsb-col>
        <bsb-card class="mt-1" v-if="show">
            <bsb-card-body>
                <slot />
            </bsb-card-body>
        </bsb-card>
    </div>
</template>

<script>
export default {
    data() {
        return {
            show: false,
        }
    },
    computed: {
        icon() {
            return this.show ? 'caret-down' : 'caret-up'
        }
    },
    methods: {
        toggleShow() {
            this.show = ! this.show
        }
    }
}
</script>