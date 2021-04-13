<template>
    <bsb-button-router-link
        color="info"
        button-type="regular"
        size="sm"
        :to="to"
    >
        <bsb-button-read-content />
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