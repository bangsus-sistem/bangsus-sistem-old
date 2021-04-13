<template>
    <bsb-button-router-link
        color="primary"
        size="sm"
        :to="to"
    >
        <bsb-button-create-content />
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