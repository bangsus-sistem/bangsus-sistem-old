<template>
    <div>
        <Col class="text-center">
            <a href="#" @click.prevent="toggleShow">
                Cari Sesuatu <wb-icon :icon="icon" color="primary" />
            </a>
        </Col>
        <Card class="mt-1" v-if="show">
            <CardBody>
                <slot />
            </CardBody>
        </Card>
    </div>
</template>

<script>
import Card from './Card'
import CardBody from './CardBody'

export default {
    components: {
        Card,
        CardBody,
    },
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