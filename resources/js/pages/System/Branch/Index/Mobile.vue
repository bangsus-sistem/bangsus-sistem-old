<template>
    <fragment>
        <h3>Cabang</h3>
        <wb-mobile-card-spinner-error
            class="mt-3"
            :loading="state.page.loading"
            :error="state.page.error"
            :error-message="state.page.message"
        >
            <h5 class="mb-3">Daftar Cabang</h5>
            <wb-access-wrapper module-ref="branch_type" action-ref="create">
                <wb-button-router-link-create :to="{ name: 'system.branch.create' }" />
            </wb-access-wrapper>
            <BranchDataQuery
                :loading="state.result.loading"
                @search="search"
                v-model="query"
                :resources="resources"
            />
            <wb-item-count
                :options="meta.counts"
                v-model="query.count"
                @input="search"
                class="mt-3"
            />
            <wb-list-group-empty class="mt-3 shadow-sm" :items="result.items">
                <BranchDataRow
                    v-for="(item, i) in result.items"
                    :key="i"
                    :num="i + 1"
                    :item="item"
                    @activate="showModalForm('branch', 'activate', { id: item['id'] })"
                    @deactivate="showModalForm('branch', 'deactivate', { id: item['id'] })"
                    @delete="showModalForm('branch', 'delete', { id: item['id'] })"
                />
            </wb-list-group-empty>
            <div class="mt-3 text-center">
                <wb-data-index
                    :first-item="result.meta['first_item']"
                    :last-item="result.meta['last_item']"
                    :total="result.meta['total']"
                />
                <wb-page-button-group v-model="query.page" :last-page="result.meta['last_page']" @changed="search" />
            </div>
        </wb-mobile-card-spinner-error>
        <!-- Modal Form -->
        <BranchModalForms ref="branch" @success="search" />
    </fragment>
</template>

<script>
import mixin from './mixin'
import BranchDataQuery from './DataQuery'
import BranchDataRow from './DataRow'
import BranchModalForms from './ModalForms'

export default {
    mixins: [mixin],
    components: { BranchDataQuery, BranchDataRow, BranchModalForms },
}
</script>