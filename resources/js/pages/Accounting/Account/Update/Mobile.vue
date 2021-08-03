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
                <h5 class="mb-3">Ubah Akun</h5>
                <form
                    class="mt-5"
                    @submit.prevent="
                        submitForm('/ajax/accounting/account', 'put', {
                            resolve: true,
                            reject: false
                        }).then(() => $router.push({ name: 'accounting.account' }))
                    "
                >
                    <bsb-form-group>
                        <label>Akun Induk</label>
                        <bsb-select-errors v-model="form.data['parent_account_id']" :errors="form.errors['parent_account_id']">
                            <option :value="null">-- Pilih Akun Induk --</option>
                            <template
                                v-for="(account, i) in resources['accounts']"
                            >
                                <bsb-option-active
                                v-if="account['id'] != $route.params.id"
                                    :key="i"
                                    :value="account['id']"
                                    :item="account"
                                >
                                    {{ account['code'] }} - {{ account['name'] }}
                                </bsb-option-active>
                            </template>
                        </bsb-select-errors>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Kode</label>
                        <bsb-input-append-prepend-errors
                            v-model="form.data['code']"
                            :errors="form.errors['code']"
                            :prependLabel="state.form.codePrefix"
                        />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Nama</label>
                        <bsb-input-errors v-model="form.data['name']" :errors="form.errors['name']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Tipe Akun</label>
                        <bsb-select-errors v-model="form.data['account_type_id']" :errors="form.errors['account_type_id']" :disabled="state.form.lockedAccountType">
                            <option :value="null">-- Pilih Tipe Akun --</option>
                            <option
                                v-for="(accountType, i) in resources['account_types']"
                                :key="i"
                                :value="accountType['id']"
                            >
                                {{ accountType['name'] }}
                            </option>
                        </bsb-select-errors>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Grup Akun Neraca</label>
                        <bsb-select-errors v-model="form.data['trial_balance_account_group_id']" :errors="form.errors['trial_balance_account_group_id']" :disabled="state.form.lockedTrialBalanceAccountGroup">
                            <option :value="null">-- Pilih Grup Akun Neraca --</option>
                            <option
                                v-for="(trialBalanceAccountGroup, i) in resources['trial_balance_account_groups']"
                                :key="i"
                                :value="trialBalanceAccountGroup['id']"
                            >
                                {{ trialBalanceAccountGroup['name'] }}
                            </option>
                        </bsb-select-errors>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Grup Akun Laba Rugi</label>
                        <bsb-select-errors v-model="form.data['profit_loss_account_group_id']" :errors="form.errors['profit_loss_account_group_id']" :disabled="state.form.lockedProfitLossAccountGroup">
                            <option :value="null">-- Pilih Grup Akun Laba Rugi --</option>
                            <option
                                v-for="(profitLossAccountGroup, i) in resources['profit_loss_account_groups']"
                                :key="i"
                                :value="profitLossAccountGroup['id']"
                            >
                                {{ profitLossAccountGroup['name'] }}
                            </option>
                        </bsb-select-errors>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Jenis Akun</label>
                        <bsb-form-radios
                            :options="[{val: false, label: 'Debit'}, {val: true, label: 'Kredit'}]"
                            v-model="form.data['reverse_value']"
                        />
                        <bsb-errors-wrapper :errors="form.errors['reverse_value']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <bsb-form-check>
                            <input type="checkbox" class="form-check-input" v-model="form.data['transaction']">
                            <bsb-form-check-label>Akun Transaksi</bsb-form-check-label>
                        </bsb-form-check>
                        <bsb-errors-wrapper :errors="form.data['errors']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Deskripsi</label>
                        <bsb-textarea-errors v-model="form.data['description']" :errors="form.errors['description']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Catatan</label>
                        <bsb-textarea-errors v-model="form.data['note']" :errors="form.errors['note']" />
                    </bsb-form-group>
                    <bsb-button-spinner type="submit" :loading="state.form.loading">
                        Submit
                    </bsb-button-spinner>
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