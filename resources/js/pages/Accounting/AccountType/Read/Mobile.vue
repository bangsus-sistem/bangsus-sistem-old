<template>
    <fragment>
        <h3>Tipe Akun</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'accounting.account_type' }"
            >
                <h5 class="mb-3">Lihat Tipe Akun</h5>
                <form
                    class="mt-5"
                    @submit.prevent=""
                >
                    <bsb-form-group>
                        <label>Referensi</label>
                        <bsb-input v-model="form.data['ref']" readonly />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Nama</label>
                        <bsb-input v-model="form.data['name']" readonly />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Jenis Akun Default</label>
                        <div>
                            <bsb-switch-badge :condition="form.data['default_reverse_value']" true-label="Debit" false-label="Kredit"/>
                        </div>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Grup Akun Neraca</label>
                        <bsb-input :value="form.data['trial_balance_account_group']['ref'] + ' ' + form.data['trial_balance_account_group']['name']" readonly />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Grup Akun Laba Rugi</label>
                        <bsb-input :value="form.data['profit_loss_account_group']['ref'] + ' ' + form.data['profit_loss_account_group']['name']" readonly />
                    </bsb-form-group>
                </form>
            </bsb-card-body-spinner-error-back>
        </bsb-card>
    </fragment>
</template>

<script>
import mixin from './mixin'

export default {
    mixins: [mixin],
}
</script>