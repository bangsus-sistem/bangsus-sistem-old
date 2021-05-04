<template>
    <fragment>
        <h3>Role</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
            >
                <h5 class="mb-3">Daftar Role</h5>
                <bsb-access-wrapper module-ref="role" action-ref="create">
                    <bsb-button-router-link-create :to="{ name: 'system.role.create' }" />
                </bsb-access-wrapper>
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
                                        v-model="query['active']"
                                        :options="[
                                            { value: '*', title: 'Semua' },
                                            { value: true, title: 'Aktif' },
                                            { value: false, title: 'Nonaktif' }
                                        ]"
                                    />
                                </bsb-th-query>
                                <bsb-th-query>
                                    <bsb-select size="sm"
                                        v-model="query['all_features']"
                                        :options="[
                                            { value: '*', title: 'Semua' },
                                            { value: true, title: 'Tak Terbatas' },
                                            { value: false, title: 'Terbatas' }
                                        ]"
                                    />
                                </bsb-th-query>
                                <bsb-th-query>
                                    <bsb-select size="sm"
                                        v-model="query['all_widgets']"
                                        :options="[
                                            { value: '*', title: 'Semua' },
                                            { value: true, title: 'Tak Terbatas' },
                                            { value: false, title: 'Terbatas' }
                                        ]"
                                    />
                                </bsb-th-query>
                                <bsb-th-query>
                                    <bsb-select size="sm"
                                        v-model="query['all_reports']"
                                        :options="[
                                            { value: '*', title: 'Semua' },
                                            { value: true, title: 'Tak Terbatas' },
                                            { value: false, title: 'Terbatas' }
                                        ]"
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
                        <bsb-tbody-empty :items="result.items" :col="meta.sortOrders.length">
                            <tr v-for="(item, i) in result.items" :key="i">
                                <bsb-td>{{ i + 1 }}</bsb-td>
                                <bsb-td>{{ item['code'] }}</bsb-td>
                                <bsb-td>{{ item['name'] }}</bsb-td>
                                <bsb-td justify="center">
                                    <bsb-switch-badge :condition="item['active']" true-label="Aktif" false-label="Tidak Aktif"/>
                                </bsb-td>
                                <bsb-td justify="center">
                                    <bsb-switch-badge :condition="item['all_features']" true-label="Tak Terbatas" false-label="Terbatas"/>
                                </bsb-td>
                                <bsb-td justify="center">
                                    <bsb-switch-badge :condition="item['all_widgets']" true-label="Tak Terbatas" false-label="Terbatas"/>
                                </bsb-td>
                                <bsb-td justify="center">
                                    <bsb-switch-badge :condition="item['all_reports']" true-label="Tak Terbatas" false-label="Terbatas"/>
                                </bsb-td>
                                <bsb-td justify="center">
                                    <bsb-access-wrapper module-ref="role" action-ref="read">
                                        <bsb-button-router-link-read :to="{ name: 'system.role.read', params: { id: item['id'] } }" />
                                    </bsb-access-wrapper>
                                    <bsb-access-wrapper module-ref="role" action-ref="update">
                                        <bsb-button-router-link-update :to="{ name: 'system.role.update', params: { id: item['id'] } }" v-if="!item['locked']" />
                                        <template v-if="!item['locked']">
                                            <bsb-button-activate v-if="!item['active']" @click="showModalForm('activate', { id: item['id'] })" />
                                            <bsb-button-deactivate v-else @click="showModalForm('deactivate', { id: item['id'] })" />
                                        </template>
                                    </bsb-access-wrapper>
                                    <bsb-access-wrapper module-ref="role" action-ref="delete">
                                        <bsb-button-delete @click="showModalForm('delete', { id: item['id'] })" v-if="!item['locked']" />
                                    </bsb-access-wrapper>
                                </bsb-td>
                            </tr>
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
        <bsb-access-wrapper module-ref="role" action-ref="update">
            <bsb-modal-form
                title="Aktifkan Role"
                message="Apakah anda yakin?"
                ref="activate"
                link="/ajax/auth/role/activate"
                method="patch"
                @success="search"
            />
            <bsb-modal-form
                title="Nonaktifkan Role"
                message="Apakah anda yakin?"
                ref="deactivate"
                link="/ajax/auth/role/deactivate"
                method="patch"
                @success="search"
            />
        </bsb-access-wrapper>
        <bsb-access-wrapper module-ref="role" action-ref="delete">
            <bsb-modal-form
                title="Hapus Role"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/auth/role"
                method="delete"
                @success="search"
            />
        </bsb-access-wrapper>
    </fragment>
</template>

<script>
import mixin from './mixin'

export default {
    mixins: [mixin],
}
</script>