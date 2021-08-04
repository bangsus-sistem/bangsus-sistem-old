<template>
    <fragment>
        <h3>Akun</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'accounting.account' }"
            >
                <h5 class="mb-3">Lihat Akun</h5>
                <bsb-user-timestamps
                    :user-create="form.data['user_create']"
                    :created-at="form.data['created_at']"
                    :user-update="form.data['user_update']"
                    :updated-at="form.data['updated_at']"
                />
                <form
                    class="mt-5"
                    @submit.prevent=""
                >
                    <bsb-form-group>
                        <label>Akun Induk</label>
                        <bsb-input :value="parentAccount" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Kode</label>
                        <bsb-input v-model="form.data['code']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Nama</label>
                        <bsb-input v-model="form.data['name']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Tipe Akun</label>
                        <bsb-input :value="accountType" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Grup Akun Neraca</label>
                        <bsb-input :value="trialBalanceAccountGroup" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Grup Akun Laba Rugi</label>
                        <bsb-input :value="profitLossAccountGroup" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Jenis Akun</label>
                        <bsb-form-radios
                            :options="[{val: false, label: 'Debit'}, {val: true, label: 'Kredit'}]"
                            v-model="form.data['reverse_value']"
                            :readonly="true"
                        />
                    </bsb-form-group>
                    <bsb-form-group>
                        <bsb-form-check>
                            <input type="checkbox" class="form-check-input" v-model="form.data['transaction']" :disabled="true">
                            <bsb-form-check-label>Akun Transaksi</bsb-form-check-label>
                        </bsb-form-check>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Deskripsi</label>
                        <bsb-textarea v-model="form.data['description']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Catatan</label>
                        <bsb-textarea v-model="form.data['note']" :readonly="true" />
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