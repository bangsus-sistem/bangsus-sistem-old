<template>
    <fragment>
        <h3>Grup Akun Neraca</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'accounting.trial_balance_account_group' }"
            >
                <h5 class="mb-3">Lihat Grup Akun Neraca</h5>
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
                </form>
                <!-- Account Type -->
                <bsb-access-wrapper module-ref="account_type" action-ref="index">
                    <div>
                        <label @click.prevent="toggleShow('account_type')">
                            Tipe Akun <bsb-switch-icon true-icon="angle-down" false-icon="angle-up" v-model="meta['account_type'].show" :single-color="true" />
                        </label>
                        <bsb-table-responsive class="p-1 my-3" v-if="meta['account_type'].show">
                            <bsb-table-responsive-header>
                                <bsb-item-count :options="meta['account_type'].counts" v-model="query['account_type'].count" @input="search('account_type')" />
                            </bsb-table-responsive-header>
                            <bsb-table :hover="true">
                                <thead class="thead-light">
                                    <AccountTypeDataQuery
                                        :loading="state.result['account_type'].loading"
                                        :resources="resources"
                                        @search="search('account_type')"
                                        v-model="query['account_type']"
                                        :fl-with-trial-balance-account-group="false"
                                    />
                                    <bsb-tr-sort
                                        :sort-orders="meta['account_type'].sortOrders"
                                        :sort="query['account_type']['sort']"
                                        :order="query['account_type']['order']"
                                        v-model="query['account_type']"
                                        @sort="changeSortOrder($event, true, 'account_type')"
                                    />
                                </thead>
                                <bsb-tbody-empty :items="result['account_type'].items" :col="meta['account_type'].sortOrders.length">
                                    <AccountTypeDataRow
                                        v-for="(item, i) in result['account_type'].items"
                                        :key="i"
                                        :num="i + 1"
                                        :item="item"
                                        :fl-with-trial-balance-account-group="false"
                                    />
                                </bsb-tbody-empty>
                            </bsb-table>
                            <bsb-table-responsive-footer>
                                <bsb-data-index
                                    :first-item="result['account_type'].meta['first_item']"
                                    :last-item="result['account_type'].meta['last_item']"
                                    :total="result['account_type'].meta['total']"
                                />
                                <bsb-page-button-group v-model="query['account_type'].page" :last-page="result['account_type'].meta['last_page']" @changed="search('account_type')" />
                            </bsb-table-responsive-footer>
                        </bsb-table-responsive>
                    </div>
                </bsb-access-wrapper>
                <!-- End Account Type -->
            </bsb-card-body-spinner-error-back>
        </bsb-card>
    </fragment>
</template>

<script>
import mixin from './mixin'
import AccountTypeDataQuery from '../../AccountType/Index/DataQuery'
import AccountTypeDataRow from '../../AccountType/Index/DataRow'

export default {
    mixins: [mixin],
    components: { AccountTypeDataQuery, AccountTypeDataRow }
}
</script>