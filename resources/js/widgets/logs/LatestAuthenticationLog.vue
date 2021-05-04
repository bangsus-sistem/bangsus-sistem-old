<template>
    <WidgetWrapper
        widget-ref="authentication_logs_latest_data"
        class="col-md-12 col-lg-8 col-xl-6"
        :loading="state.widget.loading"
        title="Log Autentikasi Terakhir"
    >
        <div class="table-responsive">
            <table class="table table-hover table-sm">
                <thead>
                    <th>#</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Login/Logout</th>
                    <th>Waktu</th>
                </thead>
                <tbody>
                    <tr v-for="(authenticationLog, i) in data['authentication_logs']" :key="i">
                        <td>{{ i + 1 }}</td>
                        <td>{{ authenticationLog['full_name'] }}</td>
                        <td>{{ authenticationLog['username'] }}</td>
                        <td>{{ authenticationLog['state'] }}</td>
                        <td>{{ standardDatetime(authenticationLog['created_at']) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </WidgetWrapper>
</template>

<script>
import WidgetWrapper from '../sections/WidgetWrapper'
import mixins from '../mixins'

export default {
    components: {
        WidgetWrapper,
    },
    data() {
        return {
            meta: {
                source: '/ajax/logs/authentication_log/widget/latest_data'
            },
            data: {},
            query: {
                'timestamp': '300',
            },
        }
    },
    mixins: [ mixins ]
}
</script>