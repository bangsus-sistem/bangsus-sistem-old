<template>
    <Layout :breadcrumbs="msc.breadcrumbs" active="hrm.addressType">
        <!-- Mobile -->
        <template v-slot:mobile>
            <Mobile />
        </template>
        <!-- Desktop -->
        <template v-slot:desktop>
            <Desktop />
        </template>
    </Layout>
</template>

<script>
import Layout from '../../../../layouts/Application'
import Desktop from './Desktop'
import Mobile from './Mobile'

export default {
    components: {
        Layout,
        Desktop,
        Mobile,
    },
    data() {
        return {
            msc: {
                breadcrumbs: [
                    {
                        label: 'HRM',
                    },
                    {
                        label: 'Tipe Alamat',
                    },
                    {
                        label: 'Ubah',
                    },
                ]
            },
        }
    },
}
</script>