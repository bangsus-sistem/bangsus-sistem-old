<template>
    <fragment>
        <h3>Aksi</h3>
        <bsb-card class="mt-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'system.action' }"
            >
                <h5 class="mb-3">Lihat Aksi</h5>
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
                <bsb-access-wrapper module-ref="feature" action-ref="index">
                    <div>
                        <label @click.prevent="toggleShow('feature')">
                            Fitur <bsb-switch-icon true-icon="angle-down" false-icon="angle-up" v-model="meta['feature'].show" :single-color="true" />
                        </label>
                        <div v-if="meta['feature'].show">
                            <bsb-item-count
                                :options="meta['feature'].counts"
                                v-model="query['feature'].count"
                                @input="search('feature')"
                                class="mt-3"
                            />
                            <bsb-list-group-empty class="mt-3 shadow-sm" :items="result['feature'].items">
                                <FeatureDataRow
                                    v-for="(item, i) in result['feature'].items"
                                    :key="i"
                                    :num="i + 1"
                                    :item="item"
                                    :fl-with-action="false"
                                />
                            </bsb-list-group-empty>
                            <div class="mt-3 text-center">
                                <bsb-data-index
                                    :first-item="result['feature'].meta['first_item']"
                                    :last-item="result['feature'].meta['last_item']"
                                    :total="result['feature'].meta['total']"
                                />
                                <bsb-page-button-group v-model="query['feature'].page" :last-page="result['feature'].meta['last_page']" @changed="search('feature')" />
                            </div>
                        </div>
                    </div>
                </bsb-access-wrapper>
                <!-- End Feature -->
            </bsb-card-body-spinner-error-back>
        </bsb-card>
    </fragment>
</template>

<script>
import mixin from './mixin'
import FeatureDataRow from '../../Feature/Index/DataRow'

export default {
    mixins: [mixin],
    components: { FeatureDataRow },
}
</script>