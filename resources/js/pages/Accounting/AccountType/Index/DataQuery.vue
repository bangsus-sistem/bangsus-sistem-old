<template>
    <bsb-screen>
        <template v-slot:desktop>
            <bsb-tr-query>
                <bsb-th-query></bsb-th-query>
                <bsb-th-query>
                    <bsb-input size="sm" type="text" v-model="query['ref']" />
                </bsb-th-query>
                <bsb-th-query>
                    <bsb-input size="sm" type="text" v-model="query['name']" />
                </bsb-th-query>
                    <bsb-th-query>
                        <bsb-select size="sm"
                            v-model="query['default_reverse_value']"
                            :options="[
                                { value: '*', title: 'Semua' },
                                { value: true, title: 'Debit' },
                                { value: false, title: 'Kredit' },
                            ]"
                        />
                    </bsb-th-query>
                <bsb-th-query v-if="flWithTrialBalanceAccountGroup">
                    <bsb-select size="sm"
                        v-model="query['trial_balance_account_group_id']"
                    >
                        <option value="*">Semua</option>
                        <option :value="null">Tidak ada</option>
                        <option v-for="(trialBalanceAccountGroup, i) in resources['trial_balance_account_groups']" :key="i" :value="trialBalanceAccountGroup['id']">
                            {{ trialBalanceAccountGroup['ref'] }} - {{ trialBalanceAccountGroup['name'] }}
                        </option>
                    </bsb-select>
                </bsb-th-query>
                <bsb-th-query v-if="flWithProfitLossAccountGroup">
                    <bsb-select size="sm"
                        v-model="query['profit_loss_account_group_id']"
                    >
                        <option value="*">Semua</option>
                        <option :value="null">Tidak ada</option>
                        <option v-for="(profitLossAccountGroup, i) in resources['profit_loss_account_groups']" :key="i" :value="profitLossAccountGroup['id']">
                            {{ profitLossAccountGroup['ref'] }} - {{ profitLossAccountGroup['name'] }}
                        </option>
                    </bsb-select>
                </bsb-th-query>
                <bsb-th-query>
                    <bsb-button-spinner color="primary" size="sm" @click="$emit('search')" :loading="loading">
                        Cari
                    </bsb-button-spinner>
                </bsb-th-query>
            </bsb-tr-query>
        </template>
        <template v-slot:mobile>
            <bsb-mobile-query-form>
                <bsb-form-group>
                    <label>Ref</label>
                    <bsb-input size="sm" type="text" v-model="query['ref']" />
                </bsb-form-group>
                <bsb-form-group>
                    <label>Nama</label>
                    <bsb-input size="sm" type="text" v-model="query['name']" />
                </bsb-form-group>
                <bsb-form-group>
                    <label>Jenis Akun Default</label>
                    <bsb-select size="sm"
                        v-model="query['default_reverse_value']"
                        :options="[
                            { value: '*', title: 'Semua' },
                            { value: true, title: 'Debit' },
                            { value: false, title: 'Kredit' },
                        ]"
                    />
                </bsb-form-group>
                <bsb-form-group v-if="flWithTrialBalanceAccountGroup">
                    <bsb-select size="sm"
                        v-model="query['trial_balance_account_group_id']"
                    >
                        <option value="*">Semua</option>
                        <option :value="null">Tidak ada</option>
                        <option v-for="(trialBalanceAccountGroup, i) in resources['trial_balance_account_groups']" :key="i" :value="trialBalanceAccountGroup['id']">
                            {{ trialBalanceAccountGroup['ref'] }} - {{ trialBalanceAccountGroup['name'] }}
                        </option>
                    </bsb-select>
                </bsb-form-group>
                <bsb-form-group v-if="flWithProfitLossAccountGroup">
                    <bsb-select size="sm"
                        v-model="query['profit_loss_account_group_id']"
                    >
                        <option value="*">Semua</option>
                        <option :value="null">Tidak ada</option>
                        <option v-for="(profitLossAccountGroup, i) in resources['profit_loss_account_groups']" :key="i" :value="profitLossAccountGroup['id']">
                            {{ profitLossAccountGroup['ref'] }} - {{ profitLossAccountGroup['name'] }}
                        </option>
                    </bsb-select>
                </bsb-form-group>
                <bsb-button-spinner color="primary" size="sm" @click="$emit('search')" :loading="loading">
                    Cari
                </bsb-button-spinner>
            </bsb-mobile-query-form>
        </template>
    </bsb-screen>
</template>

<script>
import mixin from '../../../mixins/data-query-section-mixin'

export default {
    mixins: [mixin],
    props: {
        flWithTrialBalanceAccountGroup: {
            type: Boolean,
            default: true,
        },
        flWithProfitLossAccountGroup: {
            type: Boolean,
            default: true,
        },
    }
}
</script>