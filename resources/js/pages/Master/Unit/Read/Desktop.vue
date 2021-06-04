<template>
    <fragment>
        <h3>Satuan</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'master.unit' }"
            >
                <h5 class="mb-3">Lihat Satuan</h5>
                <form
                    class="mt-5"
                    @submit.prevent=""
                >
                    <bsb-form-group>
                        <label>Kode</label>
                        <bsb-input v-model="form.data['code']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Nama</label>
                        <bsb-input v-model="form.data['name']" :readonly="true" />
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