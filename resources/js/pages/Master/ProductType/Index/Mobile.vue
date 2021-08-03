<template>
    <fragment>
        <h3>Tipe Barang</h3>
        <bsb-mobile-card-spinner-error
            class="mt-3"
            :loading="state.page.loading"
            :error="state.page.error"
            :error-message="state.page.message"
        >
            <h5 class="mb-3">Daftar Tipe Barang</h5>
            <ProductTypeDataQuery
                :loading="state.result.loading"
                :resources="resources"
                @search="search"
                v-model="query"
            />
            <bsb-item-count
                :options="meta.counts"
                v-model="query.count"
                @input="search"
                class="mt-3"
            />
            <bsb-list-group-empty class="mt-3 shadow-sm" :items="result.items">
                <ProductTypeDataRow
                    v-for="(item, i) in result.items"
                    :key="i"
                    :num="i + 1"
                    :item="item"
                />
            </bsb-list-group-empty>
            <div class="mt-3 text-center">
                <bsb-data-index
                    :first-item="result.meta['first_item']"
                    :last-item="result.meta['last_item']"
                    :total="result.meta['total']"
                />
                <bsb-page-button-group v-model="query.page" :last-page="result.meta['last_page']" @changed="search" />
            </div>
        </bsb-mobile-card-spinner-error>
    </fragment>
</template>

<script>
import mixin from './mixin'
import ProductTypeDataQuery from './DataQuery'
import ProductTypeDataRow from './DataRow'

export default {
    mixins: [mixin],
    components: { ProductTypeDataQuery, ProductTypeDataRow }
}
</script>