<template>
    <fragment>
        <h3>Tipe Cabang</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'system.branchType' }"
            >
                <h5 class="mb-3">Lihat Tipe Cabang</h5>
                <form
                    class="mt-5"
                    @submit.prevent=""
                >
                    <bsb-form-group>
                        <label>Kode</label>
                        <bsb-input v-model="form.data['code']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Nama</label>
                        <bsb-input v-model="form.data['name']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Deskripsi</label>
                        <bsb-textarea v-model="form.data['description']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Catatan</label>
                        <bsb-textarea v-model="form.data['note']" :readonly="true" />
                    </bsb-form-group>
                </form>
                <!-- Branch -->
                <bsb-access-wrapper module-ref="branch" action-ref="index">
                    <div>
                        <label @click.prevent="toggleShow('branch')">
                            Branch <bsb-switch-icon true-icon="angle-down" false-icon="angle-up" v-model="meta['branch'].show" :single-color="true" />
                        </label>
                        <bsb-table-responsive class="p-1 my-3" v-if="meta['branch'].show">
                            <bsb-table-responsive-header>
                                <bsb-item-count :options="meta['branch'].counts" v-model="query['branch'].count" @input="search('branch')" />
                            </bsb-table-responsive-header>
                            <bsb-table :hover="true">
                                <thead class="thead-light">
                                    <BranchDataQuery
                                        :loading="state.result['branch'].loading"
                                        @search="search('branch')"
                                        v-model="query['branch']"
                                        :fl-with-branch-type="false"
                                    />
                                    <bsb-tr-sort
                                        :sort-orders="meta['branch'].sortOrders"
                                        :sort="query['branch']['sort']"
                                        :order="query['branch']['order']"
                                        v-model="query['branch']"
                                        @sort="changeSortOrder($event, true, 'branch')"
                                    />
                                </thead>
                                <bsb-tbody-empty :items="result['branch'].items" :col="meta['branch'].sortOrders.length">
                                    <BranchDataRow
                                        v-for="(item, i) in result['branch'].items"
                                        :key="i"
                                        :num="i + 1"
                                        :item="item"
                                        @activate="showModalForm('branch', 'activate', { id: item['id'] })"
                                        @deactivate="showModalForm('branch', 'deactivate', { id: item['id'] })"
                                        @delete="showModalForm('branch', 'delete', { id: item['id'] })"
                                        :fl-with-branch-type="false"
                                    />
                                </bsb-tbody-empty>
                            </bsb-table>
                            <bsb-table-responsive-footer>
                                <bsb-data-index
                                    :first-item="result['branch'].meta['first_item']"
                                    :last-item="result['branch'].meta['last_item']"
                                    :total="result['branch'].meta['total']"
                                />
                                <bsb-page-button-group v-model="query['branch'].page" :last-page="result['branch'].meta['last_page']" @changed="search('branch')" />
                            </bsb-table-responsive-footer>
                        </bsb-table-responsive>
                    </div>
                </bsb-access-wrapper>
                <!-- End Branch -->
            </bsb-card-body-spinner-error-back>
        </bsb-card>
    </fragment>
</template>

<script>
import mixin from './mixin'

export default {
    mixins: [mixin],
}
</script>