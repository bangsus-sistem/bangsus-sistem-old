<template>
    <Layout :breadcrumbs="msc.breadcrumbs" active="system.role">

    </Layout>
</template>

<script>
import Layout from '../../../layouts/Application'

export default {
    components: {
        Layout
    },
    data() {
        return {
            msc: {
                breadcrumbs: [
                    {
                        label: 'Sistem',
                    },
                    {
                        label: 'Role',
                    }
                ]
            }
        }
    }
}
</script>