<template>
    <fragment>
        <h3>Aksi</h3>
        <bsb-card class="mt-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
            >
                <h5 class="my-3">Lihat Aksi</h5>
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
                <!-- Feature -->
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
                                <bsb-tr-query>
                                    <bsb-th-query></bsb-th-query>
                                    <bsb-th-query></bsb-th-query>
                                    <bsb-th-query></bsb-th-query>
                                </bsb-tr-query>
                                <tr>
                                    <bsb-th>#</bsb-th>
                                    <bsb-th-sort
                                        v-for="(sortOrder, i) in meta['feature'].sortOrders"
                                        :key="i"
                                        :sort="query['feature'].sort == sortOrder.index"
                                        :order="query['feature'].order"
                                        @click="changeSortOrder(sortOrder.index, true, 'feature')"
                                    >
                                        {{ sortOrder.title }}
                                    </bsb-th-sort>
                                    <bsb-th justify="center">
                                        Aksi
                                    </bsb-th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, i) in result['feature'].items" :key="i">
                                    <bsb-td>{{ i + 1 }}</bsb-td>
                                    <bsb-td>{{ item['module']['ref'] }} - {{ item['module']['name'] }}</bsb-td>
                                    <bsb-td justify="center">
                                        <bsb-button-router-link-read :to="{ name: 'system.feature.read', params: { id: item['id'] } }" />
                                    </bsb-td>
                                </tr>
                            </tbody>
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
                <!-- End Feature -->
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