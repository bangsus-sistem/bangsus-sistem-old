<template>
    <fragment>
        <h3>Modul</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'system.module' }"
            >
                <h5 class="mb-3">Lihat Modul</h5>
                <form
                    class="mt-5"
                    @submit.prevent=""
                >
                    <bsb-form-group>
                        <label>Package</label>
                        <bsb-input :value="form.data['package']['ref']+' - '+form.data['package']['name']" readonly />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Referensi</label>
                        <bsb-input v-model="form.data['ref']" readonly />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Nama</label>
                        <bsb-input v-model="form.data['name']" readonly />
                    </bsb-form-group>
                </form>
                <!-- Feature -->
                <bsb-access-wrapper module-ref="feature" action-ref="index">
                    <div>
                        <label @click.prevent="toggleShow('feature')">
                            Fitur <bsb-switch-icon true-icon="angle-down" false-icon="angle-up" v-model="meta['feature'].show" :single-color="true" />
                        </label>
                        <bsb-table-responsive class="p-1 my-3" v-if="meta['feature'].show">
                            <bsb-table-responsive-header>
                                <bsb-item-count :options="meta['feature'].counts" v-model="query['feature'].count" @input="search('feature')" />
                            </bsb-table-responsive-header>
                            <bsb-table :hover="true">
                                <thead class="thead-light">
                                    <bsb-tr-sort
                                        :sort-orders="meta['feature'].sortOrders"
                                        :sort="query['feature']['sort']"
                                        :order="query['feature']['order']"
                                        v-model="query['feature']"
                                        @sort="changeSortOrder($event, true, 'feature')"
                                    />
                                </thead>
                                <bsb-tbody-empty :items="result['feature'].items" :col="meta['feature'].sortOrders.length">
                                    <FeatureDataRow
                                        v-for="(item, i) in result['feature'].items"
                                        :key="i"
                                        :num="i + 1"
                                        :item="item"
                                        :fl-with-module="false"
                                    />
                                </bsb-tbody-empty>
                            </bsb-table>
                            <bsb-table-responsive-footer>
                                <bsb-data-index
                                    :first-item="result['feature'].meta['first_item']"
                                    :last-item="result['feature'].meta['last_item']"
                                    :total="result['feature'].meta['total']"
                                />
                                <bsb-page-button-group v-model="query['feature'].page" :last-page="result['feature'].meta['last_page']" @changed="search('feature')" />
                            </bsb-table-responsive-footer>
                        </bsb-table-responsive>
                    </div>
                </bsb-access-wrapper>
                <!-- End Feature -->
            </bsb-card-body-spinner-error-back>
        </bsb-card>
    </fragment>
</template>

<script>
import mixin from './mixin'
import FeatureDataRow from '../../Feature/Index/DataRow'

export default {
    mixins: [mixin],
    components: { FeatureDataRow },
}
</script>