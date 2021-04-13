<template>
    <bsb-button-router-link
        color="danger"
        button-type="regular"
        size="sm"
        :to="to"
    >
        <bsb-button-delete-content />
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