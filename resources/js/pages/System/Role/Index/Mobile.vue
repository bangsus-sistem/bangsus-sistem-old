<template>
    <fragment>
        <h3>Role</h3>
        <bsb-mobile-card-spinner-error
            class="mt-3"
            :loading="state.page.loading"
            :error="state.page.error"
            :error-message="state.page.message"
        >
            <h5 class="mb-3">Daftar Role</h5>
            <bsb-button-router-link-create :to="{ name: 'system.role.create' }" />
            <bsb-mobile-query-form>
                <bsb-form-group>
                    <label>Kode</label>
                    <bsb-input size="sm" type="text" v-model="query['code']" />
                </bsb-form-group>
                <bsb-form-group>
                    <label>Nama</label>
                    <bsb-input size="sm" type="text" v-model="query['name']" />
                </bsb-form-group>
                <bsb-form-group>
                    <label>Status</label>
                    <bsb-select size="sm"
                        v-model="query['active']"
                        :options="[
                            { value: '*', title: 'Semua' },
                            { value: true, title: 'Aktif' },
                            { value: false, title: 'Nonaktif' }
                        ]"
                    />
                </bsb-form-group>
                <bsb-form-group>
                    <label>Fitur</label>
                    <bsb-select size="sm"
                        v-model="query['all_features']"
                        :options="[
                            { value: '*', title: 'Semua' },
                            { value: true, title: 'Tak Terbatas' },
                            { value: false, title: 'Terbatas' }
                        ]"
                    />
                </bsb-form-group>
                <bsb-form-group>
                    <label>Widget</label>
                    <bsb-select size="sm"
                        v-model="query['all_widgets']"
                        :options="[
                            { value: '*', title: 'Semua' },
                            { value: true, title: 'Tak Terbatas' },
                            { value: false, title: 'Terbatas' }
                        ]"
                    />
                </bsb-form-group>
                <bsb-form-group>
                    <label>Laporan</label>
                    <bsb-select size="sm"
                        v-model="query['all_reports']"
                        :options="[
                            { value: '*', title: 'Semua' },
                            { value: true, title: 'Tak Terbatas' },
                            { value: false, title: 'Terbatas' }
                        ]"
                    />
                </bsb-form-group>
                <bsb-button-spinner color="primary" size="sm" @click="search" :loading="state.result.loading">
                    Cari
                </bsb-button-spinner>
            </bsb-mobile-query-form>
            <bsb-item-count
                :options="meta.counts"
                v-model="query.count"
                @input="search"
                class="mt-3"
            />
            <bsb-list-group class="mt-3 shadow-sm">
                <bsb-list-group-item
                    class="list-group-item list-group-item-action"
                    v-for="(item, i) in result.items" :key="i"
                >
                    <bsb-list-group-item-content>
                        <template v-slot:content>
                            <small>{{ item['code'] }}</small>
                            <h6>{{ item['name'] }}</h6>
                        </template>
                        <template v-slot:right>
                            <bsb-button-router-link-read :to="{ name: 'system.role.read', params: { id: item['id'] } }" />
                            <bsb-button-router-link-update :to="{ name: 'system.role.update', params: { id: item['id'] } }" v-if="!item['locked']" />
                            <template v-if="!item['locked']">
                                <bsb-button-activate v-if="!item['active']" @click="showModalForm('activate', { id: item['id'] })" />
                                <bsb-button-deactivate v-else @click="showModalForm('deactivate', { id: item['id'] })" />
                            </template>
                            <bsb-button-delete @click="showModalForm('delete', { id: item['id'] })" v-if="!item['locked']" />
                        </template>
                        <template v-slot:footer>
                            <bsb-switch-badge :condition="item['active']" true-label="Aktif" false-label="Tidak Aktif"/>
                            <bsb-switch-badge :condition="item['all_features']" true-label="Fitur Tak Terbatas" false-label="Fitur Terbatas"/>
                            <bsb-switch-badge :condition="item['all_widgets']" true-label="Widget Tak Terbatas" false-label="Widget Terbatas"/>
                            <bsb-switch-badge :condition="item['all_reports']" true-label="Laporan Tak Terbatas" false-label="Laporan Terbatas"/>
                        </template>
                    </bsb-list-group-item-content>
                </bsb-list-group-item>
            </bsb-list-group>
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
        <bsb-modal-form
            title="Hapus Role"
            message="Apakah anda yakin?"
            ref="delete"
            link="/ajax/auth/role"
            method="delete"
            @success="search"
        />
    </fragment>
</template>

<script>
import mixin from './mixin'

export default {
    mixins: [mixin],
}
</script>