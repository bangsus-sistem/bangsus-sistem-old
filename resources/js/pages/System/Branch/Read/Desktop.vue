<template>
    <fragment>
        <h3>Cabang</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'system.branch' }"
            >
                <h5 class="mb-3">Lihat Cabang</h5>
                <form
                    class="mt-5"
                    @submit.prevent=""
                >
                    <bsb-form-group>
                        <label>Kode</label>
                        <bsb-input-append-prepend-errors
                            v-model="form.data['code']"
                            :errors="form.errors['code']"
                            :prependLabel="state.form.codePrefix"
                            :readonly="true"
                        />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Nama</label>
                        <bsb-input v-model="form.data['name']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Status</label>
                        <div>
                            <bsb-switch-badge :condition="form.data['active']" true-label="Aktif" false-label="Tidak Aktif"/>
                        </div>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Tipe Cabang</label>
                        <bsb-select v-model="form.data['branch_type_id']" :disabled="true">
                            <option :value="null">-- Pilih Tipe Cabang --</option>
                            <option
                                v-for="(branchType, i) in resources['branch_types']"
                                :key="i"
                                :value="branchType['id']"
                            >
                                {{ branchType['code'] }} - {{ branchType['name'] }}
                            </option>
                        </bsb-select>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Deskripsi</label>
                        <bsb-textarea v-model="form.data['description']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Catatan</label>
                        <bsb-textarea v-model="form.data['note']" :readonly="true" />
                    </bsb-form-group>
                </form>
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