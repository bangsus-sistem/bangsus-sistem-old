<template>
    <Layout>
        <!-- Mobile -->
        <template v-slot:mobile>
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <h1 class="mt-5 text-center">Bangsus Sistem</h1>
                    <h5 class="mt-5">Selamat Datang di Bangsus Sistem</h5>
                    <p class="text-muted">Login untuk melanjutkan</p>
                    <StandardForm v-show="pageMeta.standardLogin" />
                    <TokenForm v-show="!pageMeta.standardLogin" />
                    <SwitchLoginModeLink
                        :standard-mode-val="pageMeta.standardLogin"
                        @toggleMode="toggleLoginMode"
                    />
                </div>
            </div>
        </template>
        <!-- Desktop -->
        <template v-slot:desktop>
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-4">
                    <h1 class="mt-5 text-center">Bangsus Sistem</h1>
                    <div class="card mt-5">
                        <div class="card-body p-5">
                            <h5>Selamat Datang di Bangsus Sistem</h5>
                            <p class="text-muted">Login untuk melanjutkan</p>
                            <StandardForm v-show="pageMeta.standardLogin" />
                            <TokenForm v-show="!pageMeta.standardLogin" />
                            <SwitchLoginModeLink
                                :standard-mode-val="pageMeta.standardLogin"
                                @toggleMode="toggleLoginMode"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </Layout>
</template>

<script>
import Layout from '../../layouts/Blank'
import StandardForm from './sections/StandardForm'
import TokenForm from './sections/TokenForm'
import SwitchLoginModeLink from './sections/SwitchLoginModeLink'

export default {
    components: {
        Layout,
        StandardForm,
        TokenForm,
        SwitchLoginModeLink,
    },
    data() {
        return {
            pageMeta: {
                standardLogin: true,
            }
        }
    },
    methods: {
        toggleLoginMode(val) {
            this.pageMeta.standardLogin = val
        }
    }
}
</script>