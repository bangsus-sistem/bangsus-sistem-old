<template>
    <Layout :breadcrumbs="msc.breadcrumbs" active="dashboard">
        <!-- Mobile -->
        <template v-slot:mobile>
            
        </template>
        <!-- Desktop -->
        <template v-slot:desktop>
            <h3>Dashboard</h3>
            <bsb-row class="mt-3">
                <FeatureRequestTraffic class="my-3" />
                <AuthenticationLogTraffic class="my-3" />
                <LatestAuthenticationLog class="my-3" />
            </bsb-row>
        </template>
    </Layout>
</template>

<script>
import Layout from '../../layouts/Application'
import FeatureRequestTraffic from '../../widgets/logs/FeatureRequestTraffic'
import AuthenticationLogTraffic from '../../widgets/logs/AuthenticationLogTraffic'
import LatestAuthenticationLog from '../../widgets/logs/LatestAuthenticationLog'

export default {
    components: {
        Layout,
        FeatureRequestTraffic,
        AuthenticationLogTraffic,
        LatestAuthenticationLog,
    },
    data() {
        return {
            msc: {
                breadcrumbs: [
                    {
                        label: 'Dashboard',
                    },
                ]
            }
        }
    }
}
</script>