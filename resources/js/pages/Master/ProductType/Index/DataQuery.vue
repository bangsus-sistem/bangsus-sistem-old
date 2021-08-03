<template>
    <bsb-screen>
        <template v-slot:desktop>
            <bsb-tr-query>
                <bsb-th-query></bsb-th-query>
                <bsb-th-query>
                    <bsb-input size="sm" type="text" v-model="query['ref']" />
                </bsb-th-query>
                <bsb-th-query>
                    <bsb-input size="sm" type="text" v-model="query['name']" />
                </bsb-th-query>
                <bsb-th-query>
                    <bsb-select size="sm"
                        v-model="query['can_monitor_stock']"
                        :options="[
                            { value: '*', title: 'Semua' },
                            { value: true, title: 'Ya' },
                            { value: false, title: 'Tidak' },
                        ]"
                    />
                </bsb-th-query>
                <bsb-th-query>
                    <bsb-select size="sm"
                        v-model="query['must_monitor_stock']"
                        :options="[
                            { value: '*', title: 'Semua' },
                            { value: true, title: 'Ya' },
                            { value: false, title: 'Tidak' },
                        ]"
                    />
                </bsb-th-query>
                <bsb-th-query>
                    <bsb-button-spinner color="primary" size="sm" @click="$emit('search')" :loading="loading">
                        Cari
                    </bsb-button-spinner>
                </bsb-th-query>
            </bsb-tr-query>
        </template>
        <template v-slot:mobile>
            <bsb-mobile-query-form>
                <bsb-form-group>
                    <label>Ref</label>
                    <bsb-input size="sm" type="text" v-model="query['ref']" />
                </bsb-form-group>
                <bsb-form-group>
                    <label>Nama</label>
                    <bsb-input size="sm" type="text" v-model="query['name']" />
                </bsb-form-group>
                <bsb-form-group>
                    <label>Bisa Monitor Stok</label>
                    <bsb-select size="sm"
                        v-model="query['can_monitor_stock']"
                        :options="[
                            { value: '*', title: 'Semua' },
                            { value: true, title: 'Ya' },
                            { value: false, title: 'Tidak' },
                        ]"
                    />
                </bsb-form-group>
                <bsb-form-group>
                    <label>Harus Monitor Stok</label>
                    <bsb-select size="sm"
                        v-model="query['must_monitor_stock']"
                        :options="[
                            { value: '*', title: 'Semua' },
                            { value: true, title: 'Ya' },
                            { value: false, title: 'Tidak' },
                        ]"
                    />
                </bsb-form-group>
                <bsb-button-spinner color="primary" size="sm" @click="$emit('search')" :loading="loading">
                    Cari
                </bsb-button-spinner>
            </bsb-mobile-query-form>
        </template>
    </bsb-screen>
</template>

<script>
import mixin from '../../../mixins/data-query-section-mixin'

export default {
    mixins: [mixin],
}
</script>