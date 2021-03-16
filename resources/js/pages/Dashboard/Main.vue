<template>
    <Layout>
        <!-- Mobile -->
        <template v-slot:mobile>
            
        </template>
        <!-- Desktop -->
        <template v-slot:desktop>
            <h3>Dashboard</h3>
            <bsb-row class="mt-3">
                <FeatureRequestTraffic />
            </bsb-row>
        </template>
    </Layout>
</template>

<script>
import Layout from '../../layouts/Application'
import FeatureRequestTraffic from '../../widgets/logs/FeatureRequestTraffic'

export default {
    components: {
        Layout,
        FeatureRequestTraffic,
    },
}
</script>