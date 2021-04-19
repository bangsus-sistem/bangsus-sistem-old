<template>
    <fragment>
        <h3>Report</h3>
        <bsb-card class="mt-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
            >
                <h5 class="mb-3">Lihat Report</h5>
                <form
                    class="mt-5"
                    @submit.prevent=""
                >
                    <bsb-form-group>
                        <label>Package</label>
                        <bsb-input :value="form.data['package']['ref']+' - '+form.data['package']['name']" readonly />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Referensi</label>
                        <bsb-input v-model="form.data['ref']" readonly />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Nama</label>
                        <bsb-input v-model="form.data['name']" readonly />
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