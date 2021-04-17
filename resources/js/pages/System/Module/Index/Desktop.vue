<template>
    <fragment>
        <h3>Modul</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
            >
                <h5 class="mb-3">Daftar Modul</h5>
                <bsb-table-responsive class="p-1 my-3">
                    <bsb-table-responsive-header>
                        <bsb-item-count :options="meta.counts" v-model="query.count" @input="search" />
                    </bsb-table-responsive-header>
                    <bsb-table :hover="true">
                        <thead class="thead-light">
                            <bsb-tr-query>
                                <bsb-th-query></bsb-th-query>
                                <bsb-th-query>
                                    <bsb-select size="sm"
                                        v-model="query['package_id']"
                                    >
                                        <option value="*">Semua</option>
                                        <option v-for="(_package, i) in resources['packages']" :key="i" :value="_package['id']">
                                            {{ _package['name'] }}
                                        </option>
                                    </bsb-select>
                                </bsb-th-query>
                                <bsb-th-query>
                                    <bsb-input size="sm" type="text" v-model="query['ref']" />
                                </bsb-th-query>
                                <bsb-th-query>
                                    <bsb-input size="sm" type="text" v-model="query['name']" />
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
                                <bsb-td>{{ item['package']['ref'] }} - {{ item['package']['name'] }}</bsb-td>
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