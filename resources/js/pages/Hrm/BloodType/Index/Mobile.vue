<template>
    <fragment>
        <h3>Golongan Darah</h3>
        <bsb-mobile-card-spinner-error
            class="mt-3"
            :loading="state.page.loading"
            :error="state.page.error"
            :error-message="state.page.message"
        >
            <h5 class="mb-3">Daftar Golongan Darah</h5>
            <bsb-access-wrapper module-ref="blood_type" action-ref="create">
                <bsb-button-router-link-create :to="{ name: 'hrm.bloodType.create' }" />
            </bsb-access-wrapper>
            <BloodTypeDataQuery
                :loading="state.result.loading"
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
                <BloodTypeDataRow
                    v-for="(item, i) in result.items"
                    :key="i"
                    :num="i + 1"
                    :item="item"
                    @activate="showModalForm('bloodType', 'activate', { id: item['id'] })"
                    @deactivate="showModalForm('bloodType', 'deactivate', { id: item['id'] })"
                    @delete="showModalForm('bloodType', 'delete', { id: item['id'] })"
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
        <!-- Modal Form -->
        <BloodTypeModalForms ref="bloodType" @success="search" />
    </fragment>
</template>

<script>
import mixin from './mixin'
import BloodTypeDataQuery from './DataQuery'
import BloodTypeDataRow from './DataRow'
import BloodTypeModalForms from './ModalForms'

export default {
    mixins: [mixin],
    components: { BloodTypeDataQuery, BloodTypeDataRow, BloodTypeModalForms },
}
</script>