<template>
    <bsb-screen>
        <template v-slot:desktop>
            <bsb-tr-query>
                <bsb-th-query></bsb-th-query>
                <bsb-th-query v-if="flWithModule">
                    <bsb-select size="sm"
                        v-model="query['module_id']"
                    >
                        <option value="*">Semua</option>
                        <option v-for="(module, i) in resources['modules']" :key="i" :value="module['id']">
                            {{ module['ref'] }} - {{ module['name'] }}
                        </option>
                    </bsb-select>
                </bsb-th-query>
                <bsb-th-query v-if="flWithAction">
                    <bsb-select size="sm"
                        v-model="query['action_id']"
                    >
                        <option value="*">Semua</option>
                        <option v-for="(action, i) in resources['actions']" :key="i" :value="action['id']">
                            {{ action['ref'] }} - {{ action['name'] }}
                        </option>
                    </bsb-select>
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
                <bsb-form-group v-if="flWithModule">
                    <label>Modul</label>
                    <bsb-select size="sm"
                        v-model="query['module_id']"
                    >
                        <option value="*">Semua</option>
                        <option v-for="(module, i) in resources['modules']" :key="i" :value="module['id']">
                            {{ module['ref'] }} - {{ module['name'] }}
                        </option>
                    </bsb-select>
                </bsb-form-group>
                <bsb-form-group v-if="flWithAction">
                    <label>Aksi</label>
                    <bsb-select size="sm"
                        v-model="query['action_id']"
                    >
                        <option value="*">Semua</option>
                        <option v-for="(action, i) in resources['actions']" :key="i" :value="action['id']">
                            {{ action['ref'] }} - {{ action['name'] }}
                        </option>
                    </bsb-select>
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
    props: {
        flWithModule: {
            type: Boolean,
            default: true,
        },
        flWithAction: {
            type: Boolean,
            default: true,
        },
    }
}
</script>