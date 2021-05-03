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
                            <bsb-mobile-query-form>
                                <bsb-form-group>
                                    <label>Referensi</label>
                                    <bsb-input size="sm" type="text" v-model="query['module']['ref']" />
                                </bsb-form-group>
                                <bsb-form-group>
                                    <label>Nama</label>
                                    <bsb-input size="sm" type="text" v-model="query['module']['name']" />
                                </bsb-form-group>
                                <bsb-button-spinner color="primary" size="sm" @click="search('module')" :loading="state.result['module'].loading">
                                    Cari
                                </bsb-button-spinner>
                            </bsb-mobile-query-form>
                            <bsb-item-count
                                :options="meta['module'].counts"
                                v-model="query['module'].count"
                                @input="search('module')"
                                class="mt-3"
                            />
                            <bsb-list-group class="mt-3 shadow-sm">
                                <bsb-list-group-item
                                    class="list-group-item list-group-item-action"
                                    v-for="(item, i) in result['module'].items" :key="i"
                                >
                                    <bsb-list-group-item-content>
                                        <template v-slot:content>
                                            <small>{{ item['package']['ref'] }} - {{ item['package']['name'] }}</small>
                                            <br>
                                            <small>{{ item['ref'] }}</small>
                                            <h6>{{ item['name'] }}</h6>
                                        </template>
                                        <template v-slot:right>
                                            <bsb-access-wrapper module-ref="module" action-ref="read">
                                                <bsb-button-router-link-read :to="{ name: 'system.module.read', params: { id: item['id'] } }" />
                                            </bsb-access-wrapper>
                                        </template>
                                    </bsb-list-group-item-content>
                                </bsb-list-group-item>
                            </bsb-list-group>
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
                            <bsb-mobile-query-form>
                                <bsb-form-group>
                                    <label>Referensi</label>
                                    <bsb-input size="sm" type="text" v-model="query['widget']['ref']" />
                                </bsb-form-group>
                                <bsb-form-group>
                                    <label>Nama</label>
                                    <bsb-input size="sm" type="text" v-model="query['widget']['name']" />
                                </bsb-form-group>
                                <bsb-button-spinner color="primary" size="sm" @click="search('widget')" :loading="state.result['widget'].loading">
                                    Cari
                                </bsb-button-spinner>
                            </bsb-mobile-query-form>
                            <bsb-item-count
                                :options="meta['widget'].counts"
                                v-model="query['widget'].count"
                                @input="search('widget')"
                                class="mt-3"
                            />
                            <bsb-list-group class="mt-3 shadow-sm">
                                <bsb-list-group-item
                                    class="list-group-item list-group-item-action"
                                    v-for="(item, i) in result['widget'].items" :key="i"
                                >
                                    <bsb-list-group-item-content>
                                        <template v-slot:content>
                                            <small>{{ item['package']['ref'] }} - {{ item['package']['name'] }}</small>
                                            <br>
                                            <small>{{ item['ref'] }}</small>
                                            <h6>{{ item['name'] }}</h6>
                                        </template>
                                        <template v-slot:right>
                                            <bsb-access-wrapper module-ref="widget" action-ref="read">
                                                <bsb-button-router-link-read :to="{ name: 'system.widget.read', params: { id: item['id'] } }" />
                                            </bsb-access-wrapper>
                                        </template>
                                    </bsb-list-group-item-content>
                                </bsb-list-group-item>
                            </bsb-list-group>
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
                            <bsb-mobile-query-form>
                                <bsb-form-group>
                                    <label>Referensi</label>
                                    <bsb-input size="sm" type="text" v-model="query['report']['ref']" />
                                </bsb-form-group>
                                <bsb-form-group>
                                    <label>Nama</label>
                                    <bsb-input size="sm" type="text" v-model="query['report']['name']" />
                                </bsb-form-group>
                                <bsb-button-spinner color="primary" size="sm" @click="search('report')" :loading="state.result['report'].loading">
                                    Cari
                                </bsb-button-spinner>
                            </bsb-mobile-query-form>
                            <bsb-item-count
                                :options="meta['report'].counts"
                                v-model="query['report'].count"
                                @input="search('report')"
                                class="mt-3"
                            />
                            <bsb-list-group class="mt-3 shadow-sm">
                                <bsb-list-group-item
                                    class="list-group-item list-group-item-action"
                                    v-for="(item, i) in result['report'].items" :key="i"
                                >
                                    <bsb-list-group-item-content>
                                        <template v-slot:content>
                                            <small>{{ item['package']['ref'] }} - {{ item['package']['name'] }}</small>
                                            <br>
                                            <small>{{ item['ref'] }}</small>
                                            <h6>{{ item['name'] }}</h6>
                                        </template>
                                        <template v-slot:right>
                                            <bsb-access-wrapper module-ref="report" action-ref="read">
                                                <bsb-button-router-link-read :to="{ name: 'system.report.read', params: { id: item['id'] } }" />
                                            </bsb-access-wrapper>
                                        </template>
                                    </bsb-list-group-item-content>
                                </bsb-list-group-item>
                            </bsb-list-group>
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

export default {
    mixins: [mixin],
}
</script>