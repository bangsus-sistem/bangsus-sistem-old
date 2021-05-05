<template>
    <fragment>
        <h3>Role</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'system.role' }"
            >
                <h5 class="mb-3">Lihat Role</h5>
                <form
                    class="mt-5"
                    @submit.prevent=""
                >
                    <bsb-form-group>
                        <label>Kode</label>
                        <bsb-input v-model="form.data['code']" :errors="form.errors['code']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Nama</label>
                        <bsb-input v-model="form.data['name']" :errors="form.errors['name']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Deskripsi</label>
                        <bsb-textarea v-model="form.data['description']" :errors="form.errors['description']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Catatan</label>
                        <bsb-textarea v-model="form.data['note']" :errors="form.errors['note']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Fitur</label>
                        <bsb-form-check>
                            <input class="form-check-input" type="radio" v-model="form.data['all_features']" :value="true" :disabled="true">
                            <bsb-form-check-label label="Akses Tak Terbatas" />
                        </bsb-form-check>
                        <bsb-form-check>
                            <input class="form-check-input" type="radio" v-model="form.data['all_features']" :value="false" :disabled="true">
                            <bsb-form-check-label label="Akses Terbatas" />
                        </bsb-form-check>
                        <bsb-table-responsive class="mt-1" v-if="!form.data['all_features']">
                            <bsb-table>
                                <thead>
                                    <bsb-tr>
                                        <bsb-th>#</bsb-th>
                                        <bsb-th>Nama Modul</bsb-th>
                                        <bsb-th
                                            justify="center"
                                            v-for="(action, i) in resources['actions']"
                                            :key="i"
                                        >
                                            {{ action['name'] }}
                                        </bsb-th>
                                    </bsb-tr>
                                </thead>
                                <tbody>
                                    <template
                                        v-for="_package in resources['packages']"
                                    >
                                        <!-- Package Title -->
                                        <bsb-tr :key="'package-row-' + _package['id']">
                                            <bsb-td :colspan="packageTitleColspan">
                                                <b>
                                                    {{ _package['name'] }}
                                                </b>
                                            </bsb-td>
                                        </bsb-tr>
                                        <!-- Module in the package -->
                                        <bsb-tr
                                            v-for="(module, i) in getModulesByPackageId(_package['id'])"
                                            :key="'module-row-' + module['id']"
                                        >
                                            <bsb-td>
                                                {{ i + 1 }}
                                            </bsb-td>
                                            <bsb-td>
                                                {{ module['name'] }}
                                            </bsb-td>
                                            <bsb-td
                                                justify="center"
                                                v-for="(action, i) in resources['actions']"
                                                :key="i"
                                            >
                                                <span v-if="featureExists(module['id'], action['id'])">
                                                    <bsb-switch-icon :value="featureIsChecked(getFeature(module['id'], action['id'])['id'])" />
                                                </span>
                                            </bsb-td>
                                        </bsb-tr>
                                    </template>
                                </tbody>
                            </bsb-table>
                        </bsb-table-responsive>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Widget</label>
                        <bsb-form-check>
                            <input class="form-check-input" type="radio" v-model="form.data['all_widgets']" :value="true" :disabled="true">
                            <bsb-form-check-label label="Akses Tak Terbatas" />
                        </bsb-form-check>
                        <bsb-form-check>
                            <input class="form-check-input" type="radio" v-model="form.data['all_widgets']" :value="false" :disabled="true">
                            <bsb-form-check-label label="Akses Terbatas" />
                        </bsb-form-check>
                        <bsb-table-responsive class="mt-1" v-if="!form.data['all_widgets']">
                            <bsb-table>
                                <tbody>
                                    <template
                                        v-for="_package in resources['packages']"
                                    >
                                        <!-- Package Title -->
                                        <bsb-tr :key="'package-row-' + _package['id']">
                                            <bsb-td :colspan="packageTitleColspan">
                                                <b>
                                                    {{ _package['name'] }}
                                                </b>
                                            </bsb-td>
                                        </bsb-tr>
                                        <!-- Widget in the package -->
                                        <bsb-tr
                                            v-for="(widget, i) in getWidgetsByPackageId(_package['id'])"
                                            :key="'widget-row-' + widget['id']"
                                        >
                                            <bsb-td>
                                                {{ i + 1 }}
                                            </bsb-td>
                                            <bsb-td>
                                                {{ widget['name'] }}
                                            </bsb-td>
                                            <bsb-td
                                                justify="center"
                                            >
                                                <bsb-switch-icon :value="widgetIsChecked(widget['id'])" />
                                            </bsb-td>
                                        </bsb-tr>
                                    </template>
                                </tbody>
                            </bsb-table>
                        </bsb-table-responsive>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Laporan</label>
                        <bsb-form-check>
                            <input class="form-check-input" type="radio" v-model="form.data['all_reports']" :value="true" :disabled="true">
                            <bsb-form-check-label label="Akses Tak Terbatas" />
                        </bsb-form-check>
                        <bsb-form-check>
                            <input class="form-check-input" type="radio" v-model="form.data['all_reports']" :value="false" :disabled="true">
                            <bsb-form-check-label label="Akses Terbatas" />
                        </bsb-form-check>
                        <bsb-table-responsive class="mt-1" v-if="!form.data['all_reports']">
                            <bsb-table>
                                <tbody>
                                    <template
                                        v-for="_package in resources['packages']"
                                    >
                                        <!-- Package Title -->
                                        <bsb-tr :key="'package-row-' + _package['id']">
                                            <bsb-td :colspan="packageTitleColspan">
                                                <b>
                                                    {{ _package['name'] }}
                                                </b>
                                            </bsb-td>
                                        </bsb-tr>
                                        <!-- Widget in the package -->
                                        <bsb-tr
                                            v-for="(report, i) in getReportsByPackageId(_package['id'])"
                                            :key="'report-row-' + report['id']"
                                        >
                                            <bsb-td>
                                                {{ i + 1 }}
                                            </bsb-td>
                                            <bsb-td>
                                                {{ report['name'] }}
                                            </bsb-td>
                                            <bsb-td
                                                justify="center"
                                            >
                                                <bsb-switch-icon :value="reportIsChecked(report['id'])" />
                                            </bsb-td>
                                        </bsb-tr>
                                    </template>
                                </tbody>
                            </bsb-table>
                        </bsb-table-responsive>
                    </bsb-form-group>
                </form>
                <!-- User -->
                <bsb-access-wrapper module-ref="user" action-ref="index">
                    <div>
                        <label @click.prevent="toggleShow('user')">
                            User <bsb-switch-icon true-icon="angle-down" false-icon="angle-up" v-model="meta['user'].show" :single-color="true" />
                        </label>
                        <bsb-table-responsive class="p-1 my-3" v-if="meta['user'].show">
                            <bsb-table-responsive-header>
                                <bsb-item-count :options="meta['user'].counts" v-model="query['user'].count" @input="search('user')" />
                            </bsb-table-responsive-header>
                            <bsb-table :hover="true">
                                <thead class="thead-light">
                                    <bsb-tr-query>
                                        <bsb-th-query></bsb-th-query>
                                        <bsb-th-query>
                                            <bsb-input size="sm" type="text" v-model="query['username']" />
                                        </bsb-th-query>
                                        <bsb-th-query>
                                            <bsb-input size="sm" type="text" v-model="query['full_name']" />
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
                                                v-model="query['all_branches']"
                                                :options="[
                                                    { value: '*', title: 'Semua' },
                                                    { value: true, title: 'Tak Terbatas' },
                                                    { value: false, title: 'Terbatas' }
                                                ]"
                                            />
                                        </bsb-th-query>
                                        <bsb-th-query>
                                            <bsb-button-spinner color="primary" size="sm" @click="search('user')" :loading="state.result['user'].loading">
                                                Cari
                                            </bsb-button-spinner>
                                        </bsb-th-query>
                                    </bsb-tr-query>
                                    <tr>
                                        <bsb-th>#</bsb-th>
                                        <bsb-th-sort
                                            v-for="(sortOrder, i) in meta['user'].sortOrders"
                                            :key="i"
                                            :sort="query['user'].sort == sortOrder.index"
                                            :order="query['user'].order"
                                            @click="changeSortOrder(sortOrder.index, true, 'user')"
                                        >
                                            {{ sortOrder.title }}
                                        </bsb-th-sort>
                                        <bsb-th justify="center">
                                            Aksi
                                        </bsb-th>
                                    </tr>
                                </thead>
                                <bsb-tbody-empty :items="result['user'].items" :col="meta['user'].sortOrders.length">
                                    <tr v-for="(item, i) in result['user'].items" :key="i">
                                        <bsb-td>{{ i + 1 }}</bsb-td>
                                        <bsb-td>{{ item['username'] }}</bsb-td>
                                        <bsb-td>{{ item['full_name'] }}</bsb-td>
                                        <bsb-td justify="center">
                                            <bsb-switch-badge :condition="item['active']" true-label="Aktif" false-label="Tidak Aktif"/>
                                        </bsb-td>
                                        <bsb-td justify="center">
                                            <bsb-switch-badge :condition="item['all_branches']" true-label="Tak Terbatas" false-label="Terbatas"/>
                                        </bsb-td>
                                        <bsb-td justify="center">
                                            <bsb-access-wrapper module-ref="user" action-ref="read">
                                                <bsb-button-router-link-read :to="{ name: 'system.user.read', params: { id: item['id'] } }" />
                                            </bsb-access-wrapper>
                                            <bsb-access-wrapper module-ref="user" action-ref="update">
                                                <bsb-button-router-link-update :to="{ name: 'system.user.update', params: { id: item['id'] } }" v-if="!item['locked']" />
                                                <template v-if="!item['locked']">
                                                    <bsb-button-activate v-if="!item['active']" @click="showModalForm('activate', { id: item['id'] })" />
                                                    <bsb-button-deactivate v-else @click="showModalForm('deactivate', { id: item['id'] })" />
                                                </template>
                                            </bsb-access-wrapper>
                                            <bsb-access-wrapper module-ref="user" action-ref="delete">
                                                <bsb-button-delete @click="showModalForm('delete', { id: item['id'] })" v-if="!item['locked']" />
                                            </bsb-access-wrapper>
                                        </bsb-td>
                                    </tr>
                                </bsb-tbody-empty>
                            </bsb-table>
                            <bsb-table-responsive-footer>
                                <bsb-data-index
                                    :first-item="result['user'].meta['first_item']"
                                    :last-item="result['user'].meta['last_item']"
                                    :total="result['user'].meta['total']"
                                />
                                <bsb-page-button-group v-model="query['user'].page" :last-page="result['user'].meta['last_page']" @changed="search('user')" />
                            </bsb-table-responsive-footer>
                        </bsb-table-responsive>
                    </div>
                </bsb-access-wrapper>
                <!-- End User -->
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