<template>
    <bsb-screen>
        <template v-slot:desktop>
            <tr>
                <bsb-td>{{ num }}</bsb-td>
                <bsb-td>{{ item['ref'] }}</bsb-td>
                <bsb-td>{{ item['name'] }}</bsb-td>
                <bsb-td justify="center">
                    <bsb-switch-badge :condition="item['default_reverse_value']" true-label="Debit" false-label="Kredit"/>
                </bsb-td>
                <bsb-td justify="center" v-if="flWithTrialBalanceAccountGroup">
                    <template v-if="item['trial_balance_account_group'] != null">
                        {{ item['trial_balance_account_group']['ref'] }} - {{ item['trial_balance_account_group']['name'] }}
                    </template>
                    <template v-else>
                        Tidak ada
                    </template>
                </bsb-td>
                <bsb-td justify="center" v-if="flWithProfitLossAccountGroup">
                    <template v-if="item['profit_loss_account_group'] != null">
                        {{ item['profit_loss_account_group']['ref'] }} - {{ item['profit_loss_account_group']['name'] }}
                    </template>
                    <template v-else>
                        Tidak ada
                    </template>
                </bsb-td>
                <bsb-td justify="center">
                    <bsb-access-wrapper module-ref="account_type" action-ref="read">
                        <bsb-button-router-link-read :to="{ name: 'accounting.account_type.read', params: { id: item['id'] } }" />
                    </bsb-access-wrapper>
                </bsb-td>
            </tr>
        </template>
        <template v-slot:mobile>
            <bsb-list-group-item>
                <bsb-list-group-item-content>
                    <template v-slot:content>
                        <small>{{ item['ref'] }}</small>
                        <h5 class="m-0">{{ item['name'] }}</h5>
                        <p class="m-0 p-0" v-if="flWithTrialBalanceAccountGroup">
                            <b>Grup Akun Neraca:</b>
                            <template v-if="item['trial_balance_account_group'] != null">
                                {{ item['trial_balance_account_group']['ref'] }} - {{ item['trial_balance_account_group']['name'] }}
                            </template>
                            <template v-else>
                                Tidak ada
                            </template>
                        </p>
                        <p class="m-0 p-0" v-if="flWithProfitLossAccountGroup">
                            <b>Grup Akun Laba Rugi:</b>
                            <template v-if="item['profit_loss_account_group'] != null">
                                {{ item['profit_loss_account_group']['ref'] }} - {{ item['profit_loss_account_group']['name'] }}
                            </template>
                            <template v-else>
                                Tidak ada
                            </template>
                        </p>
                    </template>
                    <template v-slot:right>
                        <bsb-access-wrapper module-ref="account_type" action-ref="read">
                            <bsb-button-router-link-read :to="{ name: 'accounting.account_type.read', params: { id: item['id'] } }" />
                        </bsb-access-wrapper>
                    </template>
                    <template v-slot:footer>
                        <bsb-switch-badge :condition="item['default_reverse_value']" true-label="Debit" false-label="Kredit"/>
                    </template>
                </bsb-list-group-item-content>
            </bsb-list-group-item>
        </template>
    </bsb-screen>
</template>

<script>
import mixin from '../../../mixins/data-row-section-mixin'

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