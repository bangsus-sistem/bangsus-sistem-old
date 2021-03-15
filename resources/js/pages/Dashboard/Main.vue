<template>
    <Layout>
        <!-- Mobile -->
        <template v-slot:mobile>
            Mobile
        </template>
        <!-- Desktop -->
        <template v-slot:desktop>
            Desktop
        </template>
    </Layout>
</template>

<script>
import Layout from '../../layouts/Application'

export default {
    components: {
        Layout,
    },
}
</script>