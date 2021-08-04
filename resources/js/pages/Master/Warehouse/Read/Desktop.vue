<template>
    <fragment>
        <h3>Gudang</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'master.warehouse' }"
            >
                <h5 class="mb-3">Tambah Gudang</h5>
                <form
                    class="mt-5"
                    @submit.prevent="
                        submitForm('/ajax/master/warehouse', 'post', {
                            resolve: true,
                            reject: false
                        }).then(() => $router.push({ name: 'master.warehouse' }))
                    "
                >
                    <bsb-form-group>
                        <label>Cabang</label>
                        <bsb-input :value="form.data['branch']['code'] + ' - ' + form.data['branch']['name']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Kode</label>
                        <bsb-input v-model="form.data['code']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Nama</label>
                        <bsb-input v-model="form.data['name']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Alamat</label>
                        <bsb-textarea v-model="form.data['address']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Deskripsi</label>
                        <bsb-textarea v-model="form.data['description']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Catatan</label>
                        <bsb-textarea v-model="form.data['note']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-button-spinner type="submit" :loading="state.form.loading">
                        Submit
                    </bsb-button-spinner>
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