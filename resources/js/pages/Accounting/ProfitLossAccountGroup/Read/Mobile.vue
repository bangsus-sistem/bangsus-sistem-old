<template>
    <fragment>
        <h3>Grup Akun Laba Rugi</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'accounting.profit_loss_account_group' }"
            >
                <h5 class="mb-3">Lihat Grup Akun Laba Rugi</h5>
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
                <!-- Module -->
                <bsb-access-wrapper module-ref="account_type" action-ref="index">
                    <div>
                        <label @click.prevent="toggleShow('account_type')">
                            Modul <bsb-switch-icon true-icon="angle-down" false-icon="angle-up" v-model="meta['account_type'].show" :single-color="true" />
                        </label>
                        <div v-if="meta['account_type'].show">
                            <AccountTypeDataQuery
                                :loading="state.result['account_type'].loading"
                                :resources="resources"
                                @search="search('account_type')"
                                v-model="query['account_type']"
                                :fl-with-profit-loss-account-group="false"
                            />
                            <bsb-item-count
                                :options="meta['account_type'].counts"
                                v-model="query['account_type'].count"
                                @input="search('account_type')"
                                class="mt-3"
                            />
                            <bsb-list-group-empty class="mt-3 shadow-sm" :items="result['account_type'].items">
                                <AccountTypeDataRow
                                    v-for="(item, i) in result['account_type'].items"
                                    :key="i"
                                    :num="i + 1"
                                    :item="item"
                                    :fl-with-profit-loss-account-group="false"
                                />
                            </bsb-list-group-empty>
                            <div class="mt-3 text-center">
                                <bsb-data-index
                                    :first-item="result['account_type'].meta['first_item']"
                                    :last-item="result['account_type'].meta['last_item']"
                                    :total="result['account_type'].meta['total']"
                                />
                                <bsb-page-button-group v-model="query['account_type'].page" :last-page="result['account_type'].meta['last_page']" @changed="search('account_type')" />
                            </div>
                        </div>
                    </div>
                </bsb-access-wrapper>
                <!-- End Module -->
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