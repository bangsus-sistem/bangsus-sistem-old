<template>
    <fragment>
        <h3>Tipe Barang</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'master.productType' }"
            >
                <h5 class="mb-3">Lihat Tipe Barang</h5>
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
                    <bsb-form-group>
                        <label>Bisa Monitor Stok</label>
                        <div>
                            <bsb-switch-badge :condition="form.data['can_monitor_stock']" true-label="Ya" false-label="Tidak"/>
                        </div>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Harus Monitor Stok</label>
                        <div>
                            <bsb-switch-badge :condition="form.data['must_monitor_stock']" true-label="Ya" false-label="Tidak"/>
                        </div>
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