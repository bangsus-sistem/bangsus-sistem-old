<template>
    <bsb-button-router-link
        color="warning"
        size="sm"
        :to="to"
    >
        <bsb-button-update-content />
    </bsb-button-router-link>
</template>

<script>
export default {
    props: {
        to: {
            required: true
        }
    }
}
</script>