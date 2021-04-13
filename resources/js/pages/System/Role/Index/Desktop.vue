<template>
    <fragment>
        <h3>Role</h3>
        <bsb-card class="mt-3">
            <bsb-card-body-spinner-error
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
            >
                <h6 class="mb-3">Daftar Role</h6>
                <bsb-button-router-link-create :to="{ name: 'system.role.create' }" />
                <bsb-table-responsive class="p-1 mt-3">
                    <bsb-table-responsive-header>
                    <bsb-item-count :options="meta.counts" v-model="query.count" @input="search" />
                </bsb-table-responsive-header>
                    <bsb-table :hover="true">
                        <thead class="thead-light">
                            <bsb-tr-query>
                                <bsb-th-query></bsb-th-query>
                                <bsb-th-query>
                                    <bsb-input size="sm" type="text" v-model="query['code']" />
                                </bsb-th-query>
                                <bsb-th-query>
                                    <bsb-input size="sm" type="text" v-model="query['name']" />
                                </bsb-th-query>
                                <bsb-th-query>
                                    <bsb-select size="sm"
                                        :options="[
                                            { value: '*', title: 'Semua' },
                                            { value: true, title: 'Aktif' },
                                            { value: false, title: 'Nonaktif' }
                                        ]"
                                        v-model="query['active']"
                                    />
                                </bsb-th-query>
                                <bsb-th-query>
                                    <bsb-button-spinner color="primary" size="sm" @click="search" :loading="state.result.loading">
                                        Cari
                                    </bsb-button-spinner>
                                </bsb-th-query>
                            </bsb-tr-query>
                            <tr>
                                <bsb-th>#</bsb-th>
                                <bsb-th-sort
                                    v-for="(sortOrder, i) in meta.sortOrders"
                                    :key="i"
                                    :sort="query.sort == sortOrder.index"
                                    :order="query.order"
                                    @click="changeSortOrder(sortOrder.index)"
                                >
                                    {{ sortOrder.title }}
                                </bsb-th-sort>
                                <bsb-th justify="center">
                                    Aksi
                                </bsb-th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, i) in result.items" :key="i">
                                <bsb-td>{{ i + 1 }}</bsb-td>
                                <bsb-td>{{ item['code'] }}</bsb-td>
                                <bsb-td>{{ item['name'] }}</bsb-td>
                                <bsb-td justify="center">
                                    <bsb-switch-badge :condition="item['active']" true-label="Aktif" false-label="Tidak Aktif"/>
                                </bsb-td>
                                <bsb-td justify="center">
                                    <bsb-button-router-link-read :to="{ name: 'system.role.read', params: { id: item['id'] } }" />
                                    <bsb-button-router-link-update :to="{ name: 'system.role.update', params: { id: item['id'] } }" />
                                    <template>
                                        <bsb-button-activate v-if="!item.active" @click="showModalForm('activate', { id: item['id'] })" />
                                        <bsb-button-deactivate v-else @click="showModalForm('deactivate', { id: item['id'] })" />
                                    </template>
                                    <bsb-button-delete @click="showModalForm('delete', { id: item['id'] })" />
                                </bsb-td>
                            </tr>
                        </tbody>
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

export default {
    mixins: [mixin],
}
</script>