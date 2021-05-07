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
                <h5 class="mb-3">Lihat Package</h5>
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
                <bsb-access-wrapper module-ref="module" action-ref="index">
                    <div>
                        <label @click.prevent="toggleShow('module')">
                            Modul <bsb-switch-icon true-icon="angle-down" false-icon="angle-up" v-model="meta['module'].show" :single-color="true" />
                        </label>
                        <div v-if="meta['module'].show">
                            <RefNameDataQuery
                                :loading="state.result['module'].loading"
                                @search="search('module')"
                                v-model="query['module']"
                            />
                            <bsb-item-count
                                :options="meta['module'].counts"
                                v-model="query['module'].count"
                                @input="search('module')"
                                class="mt-3"
                            />
                            <bsb-list-group-empty class="mt-3 shadow-sm" :items="result['module'].items">
                                <RefNameDataRow
                                    v-for="(item, i) in result['module'].items"
                                    :key="i"
                                    :num="i + 1"
                                    :item="item"
                                    read-module-ref="module"
                                    read-route-name="system.module.read"
                                />
                            </bsb-list-group-empty>
                            <div class="mt-3 text-center">
                                <bsb-data-index
                                    :first-item="result['module'].meta['first_item']"
                                    :last-item="result['module'].meta['last_item']"
                                    :total="result['module'].meta['total']"
                                />
                                <bsb-page-button-group v-model="query['module'].page" :last-page="result['module'].meta['last_page']" @changed="search('module')" />
                            </div>
                        </div>
                    </div>
                </bsb-access-wrapper>
                <!-- End Module -->
                <!-- Widget -->
                <bsb-access-wrapper module-ref="widget" action-ref="index">
                    <div>
                        <label @click.prevent="toggleShow('widget')">
                            Widget <bsb-switch-icon true-icon="angle-down" false-icon="angle-up" v-model="meta['widget'].show" :single-color="true" />
                        </label>
                        <div v-if="meta['widget'].show">
                            <RefNameDataQuery
                                :loading="state.result['widget'].loading"
                                @search="search('widget')"
                                v-model="query['widget']"
                            />
                            <bsb-item-count
                                :options="meta['widget'].counts"
                                v-model="query['widget'].count"
                                @input="search('widget')"
                                class="mt-3"
                            />
                            <bsb-list-group-empty class="mt-3 shadow-sm" :items="result['widget'].items">
                                <RefNameDataRow
                                    v-for="(item, i) in result['widget'].items"
                                    :key="i"
                                    :num="i + 1"
                                    :item="item"
                                    read-module-ref="widget"
                                    read-route-name="system.widget.read"
                                />
                            </bsb-list-group-empty>
                            <div class="mt-3 text-center">
                                <bsb-data-index
                                    :first-item="result['widget'].meta['first_item']"
                                    :last-item="result['widget'].meta['last_item']"
                                    :total="result['widget'].meta['total']"
                                />
                                <bsb-page-button-group v-model="query['widget'].page" :last-page="result['widget'].meta['last_page']" @changed="search('widget')" />
                            </div>
                        </div>
                    </div>
                </bsb-access-wrapper>
                <!-- End Widget -->
                <!-- Report -->
                <bsb-access-wrapper module-ref="report" action-ref="index">
                    <div>
                        <label @click.prevent="toggleShow('report')">
                            Report <bsb-switch-icon true-icon="angle-down" false-icon="angle-up" v-model="meta['report'].show" :single-color="true" />
                        </label>
                        <div v-if="meta['report'].show">
                            <RefNameDataQuery
                                :loading="state.result['report'].loading"
                                @search="search('report')"
                                v-model="query['report']"
                            />
                            <bsb-item-count
                                :options="meta['report'].counts"
                                v-model="query['report'].count"
                                @input="search('report')"
                                class="mt-3"
                            />
                            <bsb-list-group-empty class="mt-3 shadow-sm" :items="result['report'].items">
                                <RefNameDataRow
                                    v-for="(item, i) in result['report'].items"
                                    :key="i"
                                    :num="i + 1"
                                    :item="item"
                                    read-module-ref="report"
                                    read-route-name="system.report.read"
                                />
                            </bsb-list-group-empty>
                            <div class="mt-3 text-center">
                                <bsb-data-index
                                    :first-item="result['report'].meta['first_item']"
                                    :last-item="result['report'].meta['last_item']"
                                    :total="result['report'].meta['total']"
                                />
                                <bsb-page-button-group v-model="query['report'].page" :last-page="result['report'].meta['last_page']" @changed="search('report')" />
                            </div>
                        </div>
                    </div>
                </bsb-access-wrapper>
                <!-- End Report -->
            </bsb-card-body-spinner-error-back>
        </bsb-card>
    </fragment>
</template>

<script>
import mixin from './mixin'
import RefNameDataQuery from '../../../common/RefNameDataQuery'
import RefNameDataRow from '../../../common/RefNameDataRow'

export default {
    mixins: [mixin],
    components: { RefNameDataQuery, RefNameDataRow }
}
</script>