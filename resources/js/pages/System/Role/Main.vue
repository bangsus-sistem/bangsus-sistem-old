<template>
    <Layout :breadcrumbs="msc.breadcrumbs" active="system.role">
        <!-- Mobile -->
        <template v-slot:mobile>
            <h3>Role</h3>
        </template>
        <!-- Desktop -->
        <template v-slot:desktop>
            <h3>Role</h3>
        </template>
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