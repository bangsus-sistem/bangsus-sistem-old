<template>
    <span>
        <bsb-spinner size="sm" v-if="loading" />
        <a href="#" class="text-dark" @click.prevent="$emit('click')" v-else>
            <i class="fas fa-sync"></i>
        </a>
    </span>
</template>

<script>
export default {
    props: {
        loading: {
            type: Boolean,
            default: false,
        }
    }
}
</script>