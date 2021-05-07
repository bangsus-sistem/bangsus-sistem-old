<template>
    <bsb-screen>
        <template v-slot:desktop>
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
                    <bsb-button-spinner color="primary" size="sm" @click="$emit('search')" :loading="loading">
                        Cari
                    </bsb-button-spinner>
                </bsb-th-query>
            </bsb-tr-query>
        </template>
        <template v-slot:mobile>
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
                <bsb-button-spinner color="primary" size="sm" @click="$emit('search')" :loading="loading">
                    Cari
                </bsb-button-spinner>
            </bsb-mobile-query-form>
        </template>
    </bsb-screen>
</template>

<script>
import mixin from '../mixins/data-query-section-mixin'

export default {
    mixins: [mixin]
}
</script>