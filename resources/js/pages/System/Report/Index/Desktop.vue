<template>
    <fragment>
        <h3>Report</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
            >
                <h5 class="mb-3">Daftar Report</h5>
                <bsb-table-responsive class="p-1 my-3">
                    <bsb-table-responsive-header>
                        <bsb-item-count :options="meta.counts" v-model="query.count" @input="search" />
                    </bsb-table-responsive-header>
                    <bsb-table :hover="true">
                        <thead class="thead-light">
                            <PackageRefNameDataQuery
                                :loading="state.result.loading"
                                @search="search"
                                v-model="query"
                                :resources="resources"
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
                            <PackageRefNameDataRow
                                v-for="(item, i) in result.items"
                                :key="i"
                                :num="i + 1"
                                :item="item"
                                read-module-ref="report"
                                read-route-name="system.report.read"
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
    </fragment>
</template>

<script>
import mixin from './mixin'
import PackageRefNameDataQuery from '../../../common/PackageRefNameDataQuery'
import PackageRefNameDataRow from '../../../common/PackageRefNameDataRow'

export default {
    mixins: [mixin],
    components: { PackageRefNameDataQuery, PackageRefNameDataRow }
}
</script>