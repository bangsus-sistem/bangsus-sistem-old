<template>
    <fragment>
        <h3>Modul</h3>
        <bsb-mobile-card-spinner-error
            class="mt-3"
            :loading="state.page.loading"
            :error="state.page.error"
            :error-message="state.page.message"
        >
            <h5 class="mb-3">Daftar Modul</h5>
            <bsb-mobile-query-form>
                <bsb-form-group>
                    <label>Package</label>
                    <bsb-select size="sm"
                        v-model="query['package_id']"
                    >
                        <option value="*">Semua</option>
                        <option v-for="(_package, i) in resources['packages']" :key="i" :value="_package['id']">
                            {{ _package['name'] }}
                        </option>
                    </bsb-select>
                </bsb-form-group>
                <bsb-form-group>
                    <label>Referensi</label>
                    <bsb-input size="sm" type="text" v-model="query['ref']" />
                </bsb-form-group>
                <bsb-form-group>
                    <label>Nama</label>
                    <bsb-input size="sm" type="text" v-model="query['name']" />
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
                    :first-item="result.meta['first_item']"
                    :last-item="result.meta['last_item']"
                    :total="result.meta['total']"
                />
                <bsb-page-button-group v-model="query.page" :last-page="result.meta['last_page']" @changed="search" />
            </div>
        </bsb-mobile-card-spinner-error>
    </fragment>
</template>

<script>
import mixin from './mixin'

export default {
    mixins: [mixin],
}
</script>