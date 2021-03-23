<template>
    <WidgetWrapper module-ref="authentication_log" widget-type-ref="latest_data" class="col-md-12 col-lg-8 col-xl-6">
        <bsb-card>
            <bsb-card-body>
                <h5 class="card-title">Login Terakhir</h5>
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
                                <tr>
                                    <td>1</td>
                                    <td>Superadmin Bangsus</td>
                                    <td>superadmin@bangsus</td>
                                    <td>Login</td>
                                    <td>19 September 2020 00:00:00</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Superadmin Bangsus</td>
                                    <td>superadmin@bangsus</td>
                                    <td>Login</td>
                                    <td>19 September 2020 00:00:00</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Superadmin Bangsus</td>
                                    <td>superadmin@bangsus</td>
                                    <td>Login</td>
                                    <td>19 September 2020 00:00:00</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Superadmin Bangsus</td>
                                    <td>superadmin@bangsus</td>
                                    <td>Login</td>
                                    <td>19 September 2020 00:00:00</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Superadmin Bangsus</td>
                                    <td>superadmin@bangsus</td>
                                    <td>Login</td>
                                    <td>19 September 2020 00:00:00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </bsb-card-body>
        </bsb-card>
    </WidgetWrapper>
</template>

<script>
import WidgetWrapper from '../sections/WidgetWrapper'

export default {
    components: {
        WidgetWrapper,
    }
}
</script>