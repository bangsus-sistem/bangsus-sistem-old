<template>
    <fragment>
        <h3>Package</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'system.package' }"
            >
                <h5 class="my-3">Lihat Package</h5>
                <form
                    class="mt-5"
                    @submit.prevent=""
                >
                    <bsb-form-group>
                        <label>Referensi</label>
                        <bsb-input v-model="form.data['ref']" readonly />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Nama</label>
                        <bsb-input v-model="form.data['name']" readonly />
                    </bsb-form-group>
                </form>
                <!-- Module -->
                <div>
                    <label @click.prevent="toggleShow('module')">
                        Modul <bsb-switch-icon true-icon="angle-down" false-icon="angle-up" v-model="meta['module'].show" :single-color="true" />
                    </label>
                    <bsb-table-responsive class="p-1 my-3" v-if="meta['module'].show">
                        <bsb-table-responsive-header>
                            <bsb-item-count :options="meta['module'].counts" v-model="query['module'].count" @input="search('module')" />
                        </bsb-table-responsive-header>
                        <bsb-table :hover="true">
                            <thead class="thead-light">
                                <bsb-tr-query>
                                    <bsb-th-query></bsb-th-query>
                                    <bsb-th-query>
                                        <bsb-input size="sm" type="text" v-model="query['module']['ref']" />
                                    </bsb-th-query>
                                    <bsb-th-query>
                                        <bsb-input size="sm" type="text" v-model="query['module']['name']" />
                                    </bsb-th-query>
                                    <bsb-th-query>
                                        <bsb-button-spinner color="primary" size="sm" @click="search('module')" :loading="state.result['module'].loading">
                                            Cari
                                        </bsb-button-spinner>
                                    </bsb-th-query>
                                </bsb-tr-query>
                                <tr>
                                    <bsb-th>#</bsb-th>
                                    <bsb-th-sort
                                        v-for="(sortOrder, i) in meta['module'].sortOrders"
                                        :key="i"
                                        :sort="query['module'].sort == sortOrder.index"
                                        :order="query['module'].order"
                                        @click="changeSortOrder(sortOrder.index, true, 'module')"
                                    >
                                        {{ sortOrder.title }}
                                    </bsb-th-sort>
                                    <bsb-th justify="center">
                                        Aksi
                                    </bsb-th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, i) in result['module'].items" :key="i">
                                    <bsb-td>{{ i + 1 }}</bsb-td>
                                    <bsb-td>{{ item['ref'] }}</bsb-td>
                                    <bsb-td>{{ item['name'] }}</bsb-td>
                                    <bsb-td justify="center">
                                        <bsb-button-router-link-read :to="{ name: 'system.module.read', params: { id: item['id'] } }" />
                                    </bsb-td>
                                </tr>
                            </tbody>
                        </bsb-table>
                        <bsb-table-responsive-footer>
                            <bsb-data-index
                                :first-item="result['module'].meta['first_item']"
                                :last-item="result['module'].meta['last_item']"
                                :total="result['module'].meta['total']"
                            />
                            <bsb-page-button-group v-model="query['module'].page" :last-page="result['module'].meta['last_page']" @changed="search('module')" />
                        </bsb-table-responsive-footer>
                    </bsb-table-responsive>
                </div>
                <!-- End Module -->
                <!-- Widget -->
                <div>
                    <label @click.prevent="toggleShow('widget')">
                        Widget <bsb-switch-icon true-icon="angle-down" false-icon="angle-up" v-model="meta['widget'].show" :single-color="true" />
                    </label>
                    <bsb-table-responsive class="p-1 my-3" v-if="meta['widget'].show">
                        <bsb-table-responsive-header>
                            <bsb-item-count :options="meta['widget'].counts" v-model="query['widget'].count" @input="search('widget')" />
                        </bsb-table-responsive-header>
                        <bsb-table :hover="true">
                            <thead class="thead-light">
                                <bsb-tr-query>
                                    <bsb-th-query></bsb-th-query>
                                    <bsb-th-query>
                                        <bsb-input size="sm" type="text" v-model="query['widget']['ref']" />
                                    </bsb-th-query>
                                    <bsb-th-query>
                                        <bsb-input size="sm" type="text" v-model="query['widget']['name']" />
                                    </bsb-th-query>
                                    <bsb-th-query>
                                        <bsb-button-spinner color="primary" size="sm" @click="search('widget')" :loading="state.result['widget'].loading">
                                            Cari
                                        </bsb-button-spinner>
                                    </bsb-th-query>
                                </bsb-tr-query>
                                <tr>
                                    <bsb-th>#</bsb-th>
                                    <bsb-th-sort
                                        v-for="(sortOrder, i) in meta['widget'].sortOrders"
                                        :key="i"
                                        :sort="query['widget'].sort == sortOrder.index"
                                        :order="query['widget'].order"
                                        @click="changeSortOrder(sortOrder.index, true, 'widget')"
                                    >
                                        {{ sortOrder.title }}
                                    </bsb-th-sort>
                                    <bsb-th justify="center">
                                        Aksi
                                    </bsb-th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, i) in result['widget'].items" :key="i">
                                    <bsb-td>{{ i + 1 }}</bsb-td>
                                    <bsb-td>{{ item['ref'] }}</bsb-td>
                                    <bsb-td>{{ item['name'] }}</bsb-td>
                                    <bsb-td justify="center">
                                        <bsb-button-router-link-read :to="{ name: 'system.widget.read', params: { id: item['id'] } }" />
                                    </bsb-td>
                                </tr>
                            </tbody>
                        </bsb-table>
                        <bsb-table-responsive-footer>
                            <bsb-data-index
                                :first-item="result['widget'].meta['first_item']"
                                :last-item="result['widget'].meta['last_item']"
                                :total="result['widget'].meta['total']"
                            />
                            <bsb-page-button-group v-model="query['widget'].page" :last-page="result['widget'].meta['last_page']" @changed="search('widget')" />
                        </bsb-table-responsive-footer>
                    </bsb-table-responsive>
                </div>
                <!-- End Widget -->
                <!-- Report -->
                <div>
                    <label @click.prevent="toggleShow('report')">
                        Report <bsb-switch-icon true-icon="angle-down" false-icon="angle-up" v-model="meta['report'].show" :single-color="true" />
                    </label>
                    <bsb-table-responsive class="p-1 my-3" v-if="meta['report'].show">
                        <bsb-table-responsive-header>
                            <bsb-item-count :options="meta['report'].counts" v-model="query['report'].count" @input="search('report')" />
                        </bsb-table-responsive-header>
                        <bsb-table :hover="true">
                            <thead class="thead-light">
                                <bsb-tr-query>
                                    <bsb-th-query></bsb-th-query>
                                    <bsb-th-query>
                                        <bsb-input size="sm" type="text" v-model="query['report']['ref']" />
                                    </bsb-th-query>
                                    <bsb-th-query>
                                        <bsb-input size="sm" type="text" v-model="query['report']['name']" />
                                    </bsb-th-query>
                                    <bsb-th-query>
                                        <bsb-button-spinner color="primary" size="sm" @click="search('report')" :loading="state.result['report'].loading">
                                            Cari
                                        </bsb-button-spinner>
                                    </bsb-th-query>
                                </bsb-tr-query>
                                <tr>
                                    <bsb-th>#</bsb-th>
                                    <bsb-th-sort
                                        v-for="(sortOrder, i) in meta['report'].sortOrders"
                                        :key="i"
                                        :sort="query['report'].sort == sortOrder.index"
                                        :order="query['report'].order"
                                        @click="changeSortOrder(sortOrder.index, true, 'report')"
                                    >
                                        {{ sortOrder.title }}
                                    </bsb-th-sort>
                                    <bsb-th justify="center">
                                        Aksi
                                    </bsb-th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, i) in result['report'].items" :key="i">
                                    <bsb-td>{{ i + 1 }}</bsb-td>
                                    <bsb-td>{{ item['ref'] }}</bsb-td>
                                    <bsb-td>{{ item['name'] }}</bsb-td>
                                    <bsb-td justify="center">
                                        <bsb-button-router-link-read :to="{ name: 'system.report.read', params: { id: item['id'] } }" />
                                    </bsb-td>
                                </tr>
                            </tbody>
                        </bsb-table>
                        <bsb-table-responsive-footer>
                            <bsb-data-index
                                :first-item="result['report'].meta['first_item']"
                                :last-item="result['report'].meta['last_item']"
                                :total="result['report'].meta['total']"
                            />
                            <bsb-page-button-group v-model="query['report'].page" :last-page="result['report'].meta['last_page']" @changed="search('report')" />
                        </bsb-table-responsive-footer>
                    </bsb-table-responsive>
                </div>
                <!-- End Report -->
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