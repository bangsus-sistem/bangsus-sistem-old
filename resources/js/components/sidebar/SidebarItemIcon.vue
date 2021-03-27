<template>
    <bsb-feather-icon :icon="icon" :size="20" class="sidebar-item-icon" />
</template>

<script>
export default {
    props: {
        icon: {
            required: true,
            type: String,
        },
    }
}
</script>