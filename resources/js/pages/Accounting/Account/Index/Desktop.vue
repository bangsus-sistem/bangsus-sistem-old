<template>
    <fragment>
        <h3>Akun</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
            >
                <h5 class="mb-3">Daftar Akun</h5>
                <bsb-access-wrapper module-ref="account" action-ref="create">
                    <bsb-button-router-link-create :to="{ name: 'accounting.account.create' }" />
                </bsb-access-wrapper>
                <bsb-table-responsive class="p-1 mt-3">
                    <bsb-table-responsive-header>
                        <bsb-item-count :options="meta.counts" v-model="query.count" @input="search" />
                    </bsb-table-responsive-header>
                    <bsb-table :hover="true">
                        <thead class="thead-light">
                            <AccountDataQuery
                                :loading="state.result.loading"
                                :resources="resources"
                                @search="search"
                                v-model="query"
                            />
                            <bsb-tr-sort
                                :sort-orders="meta.sortOrders"
                                :sort="query['sort']"
                                :order="query['order']"
                                v-model="query"
                                @sort="changeSortOrder"
                            />
                        </thead>
                        <bsb-tbody-empty :items="result.items" :col="meta.sortOrders.length">
                            <AccountDataRow
                                v-for="(item, i) in result.items"
                                :key="i"
                                :num="i + 1"
                                :item="item"
                                @activate="showModalForm('account', 'activate', { id: item['id'] })"
                                @deactivate="showModalForm('account', 'deactivate', { id: item['id'] })"
                                @delete="showModalForm('account', 'delete', { id: item['id'] })"
                            />
                        </bsb-tbody-empty>
                    </bsb-table>
                    <bsb-table-responsive-footer>
                        <bsb-data-index
                            :first-item="result.meta['first_item']"
                            :last-item="result.meta['last_item']"
                            :total="result.meta['total']"
                        />
                        <bsb-page-button-group v-model="query.page" :last-page="result.meta['last_page']" @changed="search" />
                    </bsb-table-responsive-footer>
                </bsb-table-responsive>
            </bsb-card-body-spinner-error>
        </bsb-card>
        <!-- Modal Form -->
        <AccountModalForms ref="account" @success="search" />
    </fragment>
</template>

<script>
import mixin from './mixin'
import AccountDataQuery from './DataQuery'
import AccountDataRow from './DataRow'
import AccountModalForms from './ModalForms'

export default {
    mixins: [mixin],
    components: { AccountDataQuery, AccountDataRow, AccountModalForms }
}
</script>